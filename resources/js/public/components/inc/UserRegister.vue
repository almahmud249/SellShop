<template>
    <div>
        <section class="pages login-page section-padding">
			<div class="container">
				<div class="row">

					<div class="col-sm-12">
						<div class="main-input padding60 new-customer">
							<div class="log-title">
								<h3><strong>new customers</strong></h3>
							</div>
							<div class="custom-input">
								<form  @submit.prevent="register()">

									<input type="text" name="name" v-model="form.name" placeholder="Name here.." />
									<input type="text" name="email" v-model="form.email" placeholder="Email Address.." />
									<input type="text" name="address" v-model="form.password" placeholder="Password" />
									<input type="password" name="password" placeholder="Confirm Password" />

									<div class="submit-text coupon">
										<button type="primary">Submit</button>
									</div>
								</form>
							</div>
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
        return {
            form: new Form({
                email:"",
                name:"",
                password:"",
                confirm_password:"",
            })
        }
    },
    methods:{
        register(){

        }
    }
}
</script>
