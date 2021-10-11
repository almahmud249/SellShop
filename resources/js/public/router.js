
import PublicMain from "../public/components/shop/publicMain";
import UserLogin from "../public/components/inc/UserLogin";
import UserRegi from "../public/components/inc/UserRegister";
import dashboard from "../public/components/shop/dashboard";
import shop from "../public/components/shop/shop";
import wishList from "../public/components/shop/wishList";
import test from "../public/components/shop/test";
import adminMaster from "../admin/components/adminMaster";





const routes = [
    {
        path: "/",
        component: PublicMain,
        name: "home"
    },
    {
        path: "/userlogin",
        component: UserLogin,
        name: "UserLogin",
        beforeEnter: (to, from, next) => {
            // ...
            const isAuthenticated = localStorage.getItem("userLoggedin")
                ? true
                : false;

            if (to.name == "UserLogin" && isAuthenticated)
                next({ name: "dashboard" });
            else next();
        }
    },
    {
        path: "/dashboard",
        component: dashboard,
        name: "dashboard",
        beforeEnter: (to, from, next) => {
            // ...
            const isAuthenticated = localStorage.getItem("userLoggedin") ? true : false;
            console.log(isAuthenticated)
            if (to.name !== "UserLogin" && !isAuthenticated) next({ name: "UserLogin" });
            else next();
        }
    },
    {
        path: "/test",
        component: test,
        name: "test"
    },
    {
        path: "/UserRegister",
        component: UserRegi,
        name: "UserRegister"
    },

    {
        path: "/adminMaster",
        component: adminMaster,
        name: "adminMaster"
    },
    {
        path: "/shop",
        component: shop,
        name: "shop",
        beforeEnter: (to, from, next) => {
            // ...
            const isAuthenticated = localStorage.getItem("userLoggedin") ? true : false;
            console.log(isAuthenticated)
            if (to.name !== "UserLogin" && !isAuthenticated) next({ name: "UserLogin" });
            else next();
        }
    },
    {
        path: "/wishlist/:id",
        component: wishList,
        name: "wishList",
        beforeEnter: (to, from, next) => {
            // ...
            const isAuthenticated = localStorage.getItem("userLoggedin") ? true : false;
            console.log(isAuthenticated)
            if (to.name !== "UserLogin" && !isAuthenticated) next({ name: "UserLogin" });
            else next();
        }
    },


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

export default routes;
