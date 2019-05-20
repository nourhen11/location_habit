<template>
    <div>
        <section class="cart-section spad">
		<div class="container">
			<div class="row">
                <div class="col-lg-2 card-right">
					<form class="promo-code-form"> 
						<input type="text" placeholder="Enter promo code">
						<button>Submit</button>
					</form>
					<a href="" class="site-btn">home</a>
					<router-link to="/dashboard/products" class="site-btn sb-dark">Produits</router-link>
                    <a href="" class="site-btn sb-primary">Categories</a>

				</div>
				<div class="col-lg-10">
					<div class="cart-table">
						<h2> Nouveau Produit</h2>

<form @submit.prevent="createProduct()">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Titre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control inputt" placeholder="titre"  v-model="product.title" required>
    </div>
  </div>
  
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Categorie</legend>
      <div class="col-sm-10">
        <div class="form-check" v-for="category in categories" :key="category.id"> 
          <input class="form-check-input" type="radio" :value="category.id"  v-model="product.category">
          <label class="form-check-label" for="gridRadios1">
            {{category.name}}
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label ">Prix</label>
    <div class="col-sm-10">
      <input type="text" class="form-control inputt" placeholder="Prix"  v-model="product.price" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Taille</label>
    <div class="col-sm-10">
      <input type="text" class="form-control inputt" placeholder="Taille"  v-model="product.size" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Couleur</label>
    <div class="col-sm-10">
      <input type="text" class="form-control inputt" placeholder="Couleur"  v-model="product.color" required>
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Photos</label>
    <div class="col-sm-2">
        <img :src="[url1 ? url1:null]" alt="" class="imgp">
      <input type="file" class="form-control inputm" placeholder="Couleur" @change="addFile('url1', $event)">
    </div>
    <div class="col-sm-2">
        <img :src="url2" alt="" class="imgp">
      <input type="file" class="form-control inputm" placeholder="Couleur" @change="addFile('url2', $event)">
    </div>
    <div class="col-sm-2">
        <img :src="url3" alt="" class="imgp">
      <input type="file" class="form-control inputm" placeholder="Couleur" @change="addFile('url3', $event)">
    </div>
    <div class="col-sm-2">
        <img :src="url4" alt="" class="imgp">
      <input type="file" class="form-control inputm" placeholder="Couleur" @change="addFile('url4', $event)">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea name="" id="" cols="60" rows="5"  v-model="product.description" required></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>

					</div>
				</div>
				
			</div>
		</div>
	</section>
    </div>
</template>
<script>
export default {
    data(){
        return{
            categories:[],
            url1:'',url2:'',url3:'',url4:'',
            photos:[],
            product:{
                'title':'',
                'price':'',
                'size':'',
                'color':'',
                'description':'',
                'category':'',
                'user_id':3,
                'photos':[]
            }
        }
    },
    created(){
	 this.listCategories();
  },
    methods:{
    listCategories(){
         axios.get('admin/categories')
        .then(res =>{
		   	this.categories=res.data			
     })
      },
   addFile(urlKey, event) {
       this.photos.push(event.target.files[0]);
       	let reader= new FileReader();
		    reader.readAsDataURL(event.target.files[0]);
		    reader.onload=e =>{
		   	this[urlKey]=e.target.result;  
		  }	 
   },
   createProduct(){
     const formData = new FormData();
     this.photos.map(photo => formData.append('photos[]', photo, photo.name))

       axios.post('files-upload', formData)
       .then(res =>{
         this.product.photos=res.data 
         axios.post('admin/product/add',this.product)
        .then(res => {
            console.log(res.data);
            this.product={}
            this.url1='',this.url2='',this.url3='',this.url4=''
            this.$swal( "Produit Ajoutée avec Succées", "success");
            this.$router.push('/dashboard/products')
        }) 
       });
            
   }

   }
}
</script>
<style scoped>
.cart-table h2{
    margin-bottom: 2.5rem;
}

.btn{
 margin-left: 260px;
    width: 128px;
    margin-top: 20px;
    background: gray;

}
.imgp{
    height: 141px;
    width: 189px;
}
.inputm{
font-size: 10px;
}
.inputt{
    width: 30%;
}
</style>
