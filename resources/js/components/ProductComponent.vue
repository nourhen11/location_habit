<template>
    <div>
        <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Mode Femme</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<router-link to="/products"> &lt;&lt; Back to Category</router-link>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img :src="[urlActive ? 'uploads/products/'+urlActive:'uploads/products/'+product.images[0].name]" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt" @click="changeUrl(product.images[0].name)"><img :src="'uploads/products/'+product.images[0].name"></div>
							<div class="pt" @click="changeUrl(product.images[1].name)"><img :src="'uploads/products/'+product.images[1].name" ></div>
							<div class="pt" @click="changeUrl(product.images[2].name)"><img :src="'uploads/products/'+product.images[2].name"></div>
							<div class="pt" @click="changeUrl(product.images[3].name)"><img :src="'uploads/products/'+product.images[3].name" alt=""></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">{{product.title}}</h2>
					<h3 class="p-price">{{product.price}} TND/jour</h3>
					<h2 class="p-stock">Réservez en ligne</h2>
				
					<a href="#" class="site-btn">Ajouter au panier</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Description</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{{product.description}}</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->
    </div>
</template>
<script>
export default {
    data(){
		return{
			product:'',
			urlActive:null
		}
	},
	created(){
	   this.getProduct(this.$route.params.id);
	},
	methods:{
	getProduct(id){
       axios.get('user/product/'+id).then(res=>{
        this.product=res.data[0]
     })
	},
	changeUrl(url){
		this.urlActive=url
		console.log(this.urlActive)
	}
	}
}
</script>
<style scoped>
.back-link{
    padding-bottom: 15px;
    margin-top: -113px;
}
.product-pic-zoom{
width: 51%;
}
</style>
