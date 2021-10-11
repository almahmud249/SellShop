<template>
  <div class="hold-transition login-page">
    <div class="login-box">
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form role="form" method="post" @submit.prevent="login()">
            <div class="input-group mb-4">
              <input
                type="email"
                v-model="form.email"
                class="form-control"
                placeholder="Email"
                :class="{ 'is-invalid': form.errors.has('email') }"
              />

              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              <HasError :form="form" field="email" />
            </div>
            <div class="input-group mb-4">
              <input
                v-model="form.password"
                type="password"
                class="form-control"
                placeholder="Password"
                :class="{ 'is-invalid': form.errors.has('password') }"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              <HasError :form="form" field="password" />
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">
                  Sign In
                </button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="register.html" class="text-center"
              >Register a new membership</a
            >
          </p>
        </div>
      </div>
    </div>
  </div>
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
      this.form.post("/admin/login").then((res) => {
        localStorage.setItem("adminLoggedIn", JSON.stringify(res.data));
        
        this.$router.push("/admin");
      });
    },
  },
};
</script>
