import Vue from "vue";
import VueRouter from "vue-router";
import category from "./components/pages/Category";
import adminLogin from "./components/pages/adminLogin";
import adminMain from "../admin/components/adminMain";


Vue.use(VueRouter);

const routes = [
    {
        path: "/admin/admin_main",
        component: adminMain,
        name: "adminMain"
    },
    { path: "/admin/login", component: adminLogin }
];
export default new VueRouter({ routes, mode: "history" });
