<template>
   <div>
        <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Connexion</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Login</a> 
			</div>
		</div>
	</div>
     
    <form class="form-signin" @submit.prevent="login()">      
      <h2 class="form-signin-heading">Sign in</h2>
      <input type="text" class="form-control" placeholder="Email Address" required="" autofocus="" v-model="user.email" />
      <input type="password" class="form-control" name="password" placeholder="Password" required="" v-model="user.password"/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block">Login</button>   
    </form>
 
	<!-- Page info end -->
   </div>
</template>
<script>
export default {
    data(){
        return{
         user:{
         'email':'',
         'password':''
         }
        }
    },
    methods:{
     login(){
       axios.post('login',this.user)
       .then(res => {
         let token =res.data.access_token;
         localStorage.setItem('access_token',token);
         if (localStorage.getItem('access_token') != null) {
            let token =localStorage.getItem('access_token');
						axios.get('api/user',{
						headers:{'Authorization':'Bearer '+ token }
                    })
           .then(res => {
	
						localStorage.setItem('user',res.data)
				  	});
          this.$router.push('/')
         }    
       });        
      }
    }
}
</script>
<style scoped>


.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  
    margin-top: -34px;
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

	input[type="text"] {
	     margin-bottom: 12px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}


.btn-primary{
    background-color: #e16077;
    border: #e16077;
}
.btn-primary:hover{
      background-color: #e16077;
    border: #e16077;
}
</style>
