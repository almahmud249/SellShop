<template>
    <div class="content-wrapper">
        <div class="sidebar left-sidebar">
            <div class="s-side-text">
                <div class="sidebar-title clearfix">
                    <h4 class="floatleft">Categories</h4>
                    <h5 class="floatright"><a href="#">All</a></h5>
                </div>
                <div class="categories left-right-p">
                    <ul
                        id="accordion"
                        class="panel-group clearfix"
                        v-for="category in GetCategory"
                        :key="category.id"
                    >
                        <li class="panel">
                            <span
                                class="medium-a"
                                @click.prevent="filter(category.id, 'cate_id')"
                                >{{ category.name }}</span
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <div class="s-side-text">
                <div class="sidebar-title">
                    <h4>price</h4>
                </div>
                <div class="range-slider clearfix">
                    <form action="#" method="get">
                        <label
                            ><span>You range</span> $ {{ this.value[0] }} - $
                            {{ this.value[1] }}</label
                        >
                        <v-app>
                            <v-range-slider
                                @change="filter('','price')"
                                v-model="value"
                           
                                max="2000"
                                min="100"
                            ></v-range-slider>

                        </v-app>
                    </form>
                </div>
            </div>

            <div class="s-side-text">
                <div class="sidebar-title clearfix">
                    <h4 class="floatleft">size</h4>
                    <h5 class="floatright"><a href="#">All</a></h5>
                </div>
                <div class="size-select clearfix">
                    <a href="#" v-for="n in size" @click.prevent="filter(n,'size')">{{ n }}</a>
                    
                </div>
            </div>
            <div class="s-side-text">
                <div class="sidebar-title clearfix">
                    <h4 class="floatleft">color</h4>
                    <h5 class="floatright"><a href="#">All</a></h5>
                </div>
                <div class="color-select clearfix">
                    <span v-for="n in color" @click.prevent="filter(n,'color')"></span>
                </div>
            </div>
            <div class="s-side-text">
                <div class="sidebar-title clearfix">
                    <h4 class="floatleft">brands</h4>
                    <h5 class="floatright"><a href="#">All</a></h5>
                </div>
                <div class="brands-select clearfix">
                    <ul>
                        <li v-for="brand in GetBrand" :key="brand.id">
                            <a
                                href="#"
                                @click.prevent="filter(brand.id, 'barn_id')"
                                >{{ brand.name }}</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="s-side-text">
                <div class="banner clearfix">
                    <a href="#"
                        ><img src="asset/img/products/banner.jpg" alt=""
                    /></a>
                    <div class="banner-text">
                        <h2>best</h2>
                        <br />
                        <h2 class="banner-brand">brand</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import jsonData from "../../../jsonData"
export default {
    data() {
        return {
            form: {
                data: "",
                field: ""
            },
            value: [100, 2000],

            Minrange: "",
            Maxrange: "",
            size:jsonData.options.size,
            color:jsonData.colors.clr
        };
    },
    mounted() {
        this.$store.dispatch("AllCategory");
        this.$store.dispatch("AllBrand");
    },

    computed: {
        GetCategory() {
            return this.$store.getters.getCategory;
        },
        GetBrand() {
            return this.$store.getters.allBrand;
        }
    },

    methods: {
        filter(data, field) {
            if(data ===""){
                this.form.data=this.value
            }else{
                this.form.data = data
            }
            
             this.form.field = field

            this.$store.dispatch("filter", JSON.stringify(this.form));
        },

       
    }
};
</script>
