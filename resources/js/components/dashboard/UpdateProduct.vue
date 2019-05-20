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
						<h2> Modifier Produit</h2>

<form @submit.prevent="updateProduct()">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Titre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control inputt" placeholder="titre" required v-model="product[0].title">
    </div>
  </div>
  
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Categorie</legend>
      <div class="col-sm-10">
        <div class="form-check" v-for="category in categories" :key="category.id"> 
          <input class="form-check-input" type="radio" :value="category.id"  :checked="category.id == product[0].category_id" v-model="product[0].category_id">
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
      <input type="text" class="form-control inputt" placeholder="Prix"  v-model="product[0].price" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Taille</label>
    <div class="col-sm-10">
      <input type="text" class="form-control inputt" placeholder="Taille"  v-model="product[0].size" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Couleur</label>
    <div class="col-sm-10">
      <input type="text" class="form-control inputt" placeholder="Couleur"  v-model="product[0].color" required>
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Photos</label>
    <div class="col-sm-2">
        <img :src="[url1 ? url1:'uploads/products/'+product[0].images[0].name]" class="imgp" v-if="product[0].images[0]">
      <input type="file" class="form-control inputm" placeholder="Couleur" @change="addFile('url1', $event)">
    </div>
    <div class="col-sm-2">
        <img :src="[url2 ? url2:'uploads/products/'+product[0].images[1].name]" alt="" class="imgp" v-if="product[0].images[1]">
      <input type="file" class="form-control inputm" placeholder="Couleur" @change="addFile('url2', $event)">
    </div>
    <div class="col-sm-2">
        <img  :src="[url3 ? url3:'uploads/products/'+product[0].images[2].name]" class="imgp" v-if="product[0].images[2]">
      <input type="file" class="form-control inputm" placeholder="Couleur" @change="addFile('url3', $event)">
    </div>
    <div class="col-sm-2">
        <img  :src="[url4 ? url4:'uploads/products/'+product[0].images[3].name]" class="imgp" v-if="product[0].images[3]">
      <input type="file" class="form-control inputm" placeholder="Couleur" @change="addFile('url4', $event)">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea name="" id="" cols="60" rows="5" required v-model="product[0].description"></textarea>
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
            product:'',
            product_id:this.$route.params.id
        }
    },
    created(){
     this.listCategories();
     this.getProduct(this.$route.params.id);
     
  },
    methods:{
    listCategories(){
         axios.get('admin/categories')
        .then(res =>{
		   	this.categories=res.data			
     })
      },
    getProduct(id){
     axios.get('admin/product/'+id).then(res=>{
        this.product=res.data
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
   updateProduct(){
    axios.post('admin/product/update/'+this.product_id,this.product[0])
     .then(res=>{
      this.product=''
            this.url1='',this.url2='',this.url3='',this.url4=''
            this.$swal( "Produit Modifiée avec Succées", "success");
            this.$router.push('/dashboard/products')
     })          
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
