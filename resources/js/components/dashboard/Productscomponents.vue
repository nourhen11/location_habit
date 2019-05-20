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
                    <router-link to="/dashboard/users" class="site-btn sb-dark">Utilisateurs</router-link>    
				</div>
				
				<div class="col-lg-10">
					<div class="category">
				<ul class="product-filter-menu">
				<li @click="getAllProduct()"><a>TOUS</a></li>
				<li v-for="category in categories" :key="category.id" @click="getProductByCategory(category.id)"><a>{{category.name}}</a></li>
					
		     	</ul>
				 </div>
					<div class="cart-table">
						<h3>Produits</h3>
                        <router-link to="/dashboard/addProduct" id="addp">ajouter produit</router-link>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Image</th>
                                     <th class="product-th">Titre</th>

									<th class="product-th">prix</th>
									<th class="product-th">Taille</th>
									<th class="product-th">Couleur</th>
									<th class="product-th">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="product in products" :key="product.id">
									<td class="product-col">
										<img v-bind:src="'uploads/products/'+product.images[0].name" alt="" class="imgproduct">
										
									</td>
                                    <td>
                                        <div class="pc-title">
											<p>{{product.title}}</p>
										</div>
                                    </td>
									<td class="quy-col">
										<div class="quantity">
					                       {{product.price}}
                    					</div>
									</td>
									<td class="size-col"><h4>{{product.size}}</h4></td>
									<td class="total-col"><h4>{{product.color}}</h4></td>
									<td><router-link :to="`/dashboard/updateProduct/${product.id}`" ><i class="fas fa-pen"></i></router-link>
									  <a @click="deleteProduct(product.id)"><i class="fas fa-trash"></i></a>
									
									</td>
									<td></td>
								</tr>
							
								
							</tbody>

						</table>
						
						</div>
						
					</div>
					<div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">LOAD MORE</button>
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
			products:[],
			categories:[]
		}

	},
	created(){
		this.getAllProducts();
	 axios.get('admin/categories').then(response => this.categories = response.data)

	},
    methods:{
	getAllProducts(){
     axios.get('admin/products/').then(response => this.products = response.data)
	},
	getProductByCategory(id){
		axios.get('admin/products/'+id)
		.then(res =>{this.products=res.data})
	},
   deleteProduct(id){
     this.$swal({
    title: 'Voulez vous vraiment?',
     text: "supprimer ce produit!",
    type: 'warning',
    showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'oui supprimer!'
    }).then((result) => {
     if (result.value) {
      axios.get('admin/product/delete/'+id).then(res=>{
	  this.$swal(
      'produit supprimer!',
      'suppression avec succès',
      'success'
	)
	 // this.products.splice(this.products.indexOf(id), 1);
   })
  }
})
	}
}		
}
</script>
<style scoped>
#addp{
    color: #E4B436;
    font-size: 17px;
    font-weight: bold;
    margin-top: -64px;
    float: right;
}
.imgproduct{
	    height: 52px;
}
.fa-trash{
	margin-left:6px;
	color:#007bff;
	cursor: pointer;
}
.product-th{
	font-size: 20px;
}
.category{
	margin-left: 22%;
}
.category li{
	cursor: pointer;
}
.pt-3{
 margin-left: 358px;
}
</style>
