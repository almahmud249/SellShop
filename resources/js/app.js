require("./bootstrap");
// import router from "./public/router";
import common from "./common";
import vuetify from "./vuetify";
import filter from "./filter";
import store from "./modules";


window.Vue = require("vue").default;

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component(
    "public-home",
    require("./public/components/PublicMaster.vue").default
);
Vue.component(
    "admin-home",
    require("./admin/components/adminMaster.vue").default
);


import Form from "vform";
import {HasError, AlertError } from "vform/src/components/bootstrap5";

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;


// import Vuex from 'vuex'
// import storeData from './store'
// const store = new Vuex.Store(storeData);
//  import brand from './brand'
// const adminstore = new Vuex.Store(adminStore);


// var routes=[]
// routes=routes.concat(
//     Adminrouter,


// )


const app = new Vue({
    el: "#app",

    store,
    router:common,
    vuetify,
    filter,


});
