import test from "./test";
import category from "../admin/components/pages/Category";
import brand from "../admin/components/pages/Brand";
import product from "../admin/components/pages/product";
import allproduct from "../admin/components/pages/allProduct";
import editProduct from "../admin/components/pages/editProduct";
import adminLogin from "../admin/components/pages/adminLogin";
import registration from "../admin/components/pages/adminRegist";
import adminMain from "../admin/components/adminMain";
const route = [
    {
        path: "/admin/test",
        component: test
    },
    {
        path: "/admin/category",
        component: category,
        name: "category"
    },

    {
        path: "/admin",
        component: adminMain,
        name: "adminMain",
        beforeEnter: (to, from, next) => {
            let isAuthenticated = localStorage.getItem("adminLoggedIn");
            let data = localStorage.getItem("adminLoggedIn")
                ? JSON.parse(localStorage.getItem("adminLoggedIn"))
                : false;
            if (data) {
                isAuthenticated = data.id && data.email ? true : false;
            } else {
                isAuthenticated = false;
            }

            if (to.name !== "adminLogin" && !isAuthenticated)
                next({ name: "adminLogin" });
            else if (to.name == "adminLogin" && isAuthenticated) {
                next({ name: "adminMain" });
            } else next();
        }
    },

    {
        path: "/admin/login",
        component: adminLogin,
        name: "adminLogin",
        beforeEnter: (to, from, next) => {
            let isAuthenticated = localStorage.getItem("adminLoggedIn");
            let data = localStorage.getItem("adminLoggedIn")
                ? JSON.parse(localStorage.getItem("adminLoggedIn"))
                : false;
            if (data) {
                isAuthenticated = data.id && data.email ? true : false;
            } else {
                isAuthenticated = false;
            }

            if (to.name !== "adminLogin" && !isAuthenticated)
                next({ name: "adminLogin" });
            else if (to.name == "adminLogin" && isAuthenticated) {
                next({ name: "adminMain" });
            } else next();
        }
    },
    {
        path: "/admin/registration",
        component: registration,
        name: "registration"
    },

    {
        path: "/admin/brand",
        component: brand,
        name: "brand",
        beforeEnter: (to, from, next) => {
            let isAuthenticated = localStorage.getItem("adminLoggedIn");
            let data = localStorage.getItem("adminLoggedIn")
                ? JSON.parse(localStorage.getItem("adminLoggedIn"))
                : false;
            if (data) {
                isAuthenticated = data.id && data.email ? true : false;
            } else {
                isAuthenticated = false;
            }

            if (to.name !== "adminLogin" && !isAuthenticated)
                next({ name: "adminLogin" });
            else if (to.name == "adminLogin" && isAuthenticated) {
                next({ name: "adminMain" });
            } else next();
        }
    },
    {
        path: "/admin/product",
        component: product,
        name: "product",
        beforeEnter: (to, from, next) => {
            let isAuthenticated = localStorage.getItem("adminLoggedIn");
            let data = localStorage.getItem("adminLoggedIn")
                ? JSON.parse(localStorage.getItem("adminLoggedIn"))
                : false;
            if (data) {
                isAuthenticated = data.id && data.email ? true : false;
            } else {
                isAuthenticated = false;
            }

            if (to.name !== "adminLogin" && !isAuthenticated)
                next({ name: "adminLogin" });
            else if (to.name == "adminLogin" && isAuthenticated) {
                next({ name: "adminMain" });
            } else next();
        }
    },
    {
        path: "/admin/allproduct",
        component: allproduct,
        name: "allproduct",
        beforeEnter: (to, from, next) => {
            let isAuthenticated = localStorage.getItem("adminLoggedIn");
            let data = localStorage.getItem("adminLoggedIn")
                ? JSON.parse(localStorage.getItem("adminLoggedIn"))
                : false;
            if (data) {
                isAuthenticated = data.id && data.email ? true : false;
            } else {
                isAuthenticated = false;
            }

            if (to.name !== "adminLogin" && !isAuthenticated)
                next({ name: "adminLogin" });
            else if (to.name == "adminLogin" && isAuthenticated) {
                next({ name: "adminMain" });
            } else next();
        }
    },
    {
        path: "/admin/editProduct/:id",
        component: editProduct,
        name: "editProduct",
        beforeEnter: (to, from, next) => {
            let isAuthenticated = localStorage.getItem("adminLoggedIn");
            let data = localStorage.getItem("adminLoggedIn")
                ? JSON.parse(localStorage.getItem("adminLoggedIn"))
                : false;
            if (data) {
                isAuthenticated = data.id && data.email ? true : false;
            } else {
                isAuthenticated = false;
            }

            if (to.name !== "adminLogin" && !isAuthenticated)
                next({ name: "adminLogin" });
            else if (to.name == "adminLogin" && isAuthenticated) {
                next({ name: "adminMain" });
            } else next();
        }
    }
];
// const router = new VueRouter({ routes, mode: "history" });

// router.beforeEach((to, from, next) => {
//     let isAuthenticated = localStorage.getItem("adminLoggedIn");
//     let data = localStorage.getItem("adminLoggedIn") ? JSON.parse(localStorage.getItem("adminLoggedIn")) :false;
//     if(data){
//         isAuthenticated =data.id && data.email ? true : false;
//     }else{
//         isAuthenticated = false;
//     }

//     if (to.name !== "adminLogin" && !isAuthenticated) next({ name: "adminLogin" });
//     else if(to.name == "adminLogin" && isAuthenticated){
//         next({ name: "adminMain" });
//     }

//     else next();
// });
export default route;
