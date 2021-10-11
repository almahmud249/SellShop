
import Vue from 'vue'
import Router from 'vue-router'
import router from './public/router'
import AdminRoutes from './admin/admin'

Vue.use(Router)

var allRoutes = []
allRoutes = allRoutes.concat(router, AdminRoutes)

const routes = allRoutes

export default new Router({
  routes, mode: "history"
})

