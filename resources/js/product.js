import axios from "axios";
export default {
    state: {
        product:[]
    },
    getters: {
        allProduct(state){
            return state.product;
        }
    },
    actions: {
        AllProduct(context) {
            axios.get("/admin/get_product").then(response => {

                context.commit("product", response.data);
            });
        },
        filter(context,payload){
            axios.get(`/get_pro_by_filter/${payload}`)
            .then((response) => {
                context.commit("product",response.data.data);

            })
        },
      
    },
    mutations: {
        product(state, data) {
            return (state.product = data);
        }
    }
};
