<template>
    <div class="content-wrapper">
        	<section class="pages wishlist-page section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive padding60">
							<table class="wishlist-table text-center">
								<thead>

									<tr>
										<th>Product</th>
										<th>Price</th>
										<th>Stock Status </th>
										<th>Add To Cart</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody v-for="list in wishList" :key="list.id">
									<tr>
										<td class="td-img text-left">
											<a href="#"><img :src="`/img/${list.image}`" alt="Add Product" /></a>
											<div class="items-dsc">
												<h5><a href="#">{{list.name}}</a></h5>
												<p class="itemcolor">Color : <span>Blue</span></p>
												<p class="itemcolor">Size   : <span>SL</span></p>
											</div>
										</td>
										<td>$ {{list.price}}</td>
										<td>In Stock</td>
										<td>
											<div class="submit-text">
												<a href="cart.html">Add to cart</a>
											</div>
										</td>
										<td><i class="mdi mdi-close" title="Remove this product"></i></td>
									</tr>

								</tbody>
							</table>
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
            wishList:{}
        }

    },
    created(){
        axios.get("/get_all_wishList/"+this.$route.params.id)
            .then((response) => {

                this.wishList = response.data

            })
    }
}
</script>
