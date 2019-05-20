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
					<div class="cart-table">
						<h3>Utilisateurs</h3>
                        <router-link to="/dashboard/addProduct" id="addp">ajouter user</router-link>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Image</th>
                                     <th class="product-th">Nom</th>

									<th class="product-th">Prenom</th>
									<th class="product-th">Téléphone</th>
									<th class="product-th">Email</th>
									<th class="product-th">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="user in users" :key="user.id">
									<td class="product-col">
										<img :src="[user.photo? 'uploads/users/'+user.photo:'img/unknown.png' ]" alt="" class="imgproduct">
										
									</td>
                                    <td>
                                       <div class="quantity">
					                       {{user.first_name}}
                    					</div>
                                    </td>
									<td class="quy-col">
										<div class="quantity">
					                       {{user.last_name}}
                    					</div>
									</td>
									<td class="size-col">{{user.phone}}</td>
									<td class="total-col">{{user.email}}</td>
									<td><a href="#"><i class="fas fa-pen"></i></a>
									  <a href="#"><i class="fas fa-trash"></i></a>
									
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
			users:[]
		}

	},
	created(){
	 axios.get('admin/users').then(response => this.users = response.data)
	},
    methods:{
	
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
