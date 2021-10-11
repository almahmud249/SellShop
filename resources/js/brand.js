import axios from "axios";
export default {
    state: {
        brand:[]
    },
    getters: {
        allBrand(state){
            return state.brand;
        }
    },
    actions: {
        AllBrand(context) {
            axios.get("/admin/get_brand").then(response => {
                
                context.commit("brand", response.data);
            });
        }
    },
    mutations: {
        brand(state, data) {
            return (state.brand = data);
        }
    }
};
