<template>
  <div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img
              src="dist/img/user2-160x160.jpg"
              class="img-circle elevation-2"
              alt="User Image"
            />
          </div>
          <div class="info">
            <a href="#" class="d-block">{{admin.name}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <router-link to="/admin" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/admin/category" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Category

                </p>
              </router-link>
            </li>
             <li class="nav-item">
              <router-link to="/admin/brand" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Brand

                </p>
              </router-link>
            </li>
             <li class="nav-item">
              <router-link to="/admin/allproduct" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Product

                </p>
              </router-link>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  </div>
</template>
<script>
export default {
    computed: {
    admin() {
      return this.$store.getters.admin;
    },
  },
};
</script>
