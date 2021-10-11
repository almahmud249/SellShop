<template>
  <span>
    <section class="pages login-page section-padding">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="main-input padding60">
              <div class="log-title">
                <h3><strong>registered </strong></h3>
              </div>
              <div class="login-text">
                <div class="custom-input">
                  <p>If you have an account with us, Please log in!</p>
                  <form role="form" @submit.prevent="login()">
                    <input
                      type="text"
                      name="email"
                      v-model="form.email"
                      class="mt-n12"
                      placeholder="Email"
                      :class="{ 'is-invalid': form.errors.has('email') }"
                    />
                    <HasError :form="form" style="color:red" field="email" />
                    <input
                      v-model="form.password"
                      type="password"
                      class="mt-n12"
                      name="password"
                      placeholder="Password"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                    />
                    <HasError :form="form" style="color:red" field="password" />

                    <a class="forget" href="#">Forget your password?</a>
                    <div class="submit-text">
                      <button type="submit" class="primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </span>
</template>
<script>
export default {
  data() {
    return {
      form: new Form({
        email: "",
        password: "",
      }),
    };
  },

  methods: {
    login() {
      this.form.post("/login").then((response) => {
          localStorage.setItem("userLoggedin",true)

         this.$router.push("/dashboard")
      });
    },
  },
};
</script>
