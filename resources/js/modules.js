
import Vue from 'vue'
import Vuex from 'vuex'
import storeData from './store'
import storeBrand from './brand'
import storeProduct from './product'
Vue.use(Vuex)
const store = new Vuex.Store({
    modules:{
        category:storeData,
        brand:storeBrand,
        product:storeProduct
    },
    state(){

    },
    getters:{

    },
    mutations:{},
    actions:{},

});
export default store;
