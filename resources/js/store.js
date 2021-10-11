import axios from "axios";

export default {
    state: {
        allusers: [],
        admin:[],
        category:[]
    },
    getters: {
        allUsers(state) {
            return state.allusers;
        },
        admin(state) {
            return state.admin;
        },
        getCategory(state) {
            return state.category;
        },
    },
    actions: {
        Users(context) {
            axios.get("all_users").then(response => {
                let output = {
                    id: ""
                };
                context.commit("allUsers", response.data);
            });
        },
        Userlogout(context) {
            axios.post("/logout").then(response => {
                context.commit("allUsers", response.data);
            });
        },
        AuthAdmin(context){
            axios.get("/admin/get_admin").then(response => {

                context.commit("admin",response.data);
            })
        },
        AllCategory(context){
            axios.get("/admin/get_category")
            .then((response) => {
                context.commit("category",response.data);

            })
        },

      
    },
    mutations: {
        allUsers(state, data) {
            return (state.allusers = data);
        },
        admin(state, data) {
            return (state.admin = data);
        },
        category(state, data) {
            return (state.category = data);
        },
    }
};
