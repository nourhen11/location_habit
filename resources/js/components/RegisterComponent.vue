<template>
  <div>
    <!-- Page info -->
    <div class="page-top-info">
      <div class="container">
        <h4>Creer un compte</h4>
        <div class="site-pagination">
          <a href>Home</a> /
          <a href>Register</a>
        </div>
      </div>
    </div>

    <form  @submit.prevent="register()" class="form-signin" enctype="multipart/form-data">
      <h2 class="form-signin-heading">sign up</h2>
      <input type="text" class="form-control" placeholder="Prenom" required v-model="user.first_name">
      <input type="text" class="form-control" placeholder="Nom" required v-model="user.last_name">
      <input type="email" class="form-control" placeholder="Email" required v-model="user.email">
      <input type="password" class="form-control" name="password" placeholder="Password" required v-model="user.password" >
      <input type="text" class="form-control" placeholder="Telephone" required v-model="user.phone">
      <input type="file" class="form-control" placeholder="Photo" v-on:change="onImageChange">
      <img :src="url" class="imgregister" v-if="url">
      <button class="btn btn-lg btn-primary btn-block" type="submit"> Enregistrer</button>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      user: {
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        phone: "",
        photo: ""
    } , 
	  url:null,photos:null
	}
  },
  methods: {
	  onImageChange(e){
		this.photos= e.target.files[0];
		let reader= new FileReader();
		reader.readAsDataURL(this.photos);
		reader.onload=e =>{
			this.url=e.target.result;
		}	   
    },
    register() {
     const formData = new FormData();
     formData.append('photo',this.photos)
      axios.post('file-upload',formData).then(res =>{
        this.user.photo=res.data
         axios.post("register",this.user)
		     .then(res => {console.log(res.data) ;this.user={};this.url='';this.$router.push('/login')})
      })		 
    },
  }
}
</script>
<style scoped>
.imgregister{
  margin-bottom: 20px;
      height: 122px;

}
.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.1);
  margin-top: -76+px;
  margin-bottom: 30px;
}
.form-signin-heading,
.checkbox {
  margin-bottom: 30px;
}

.checkbox {
  font-weight: normal;
}

.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
}

input {
  margin-bottom: 12px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.btn-primary {
  background-color: #e16077;
  border: #e16077;
}
.btn-primary:hover{
      background-color: #e16077;
    border: #e16077;
}

</style>