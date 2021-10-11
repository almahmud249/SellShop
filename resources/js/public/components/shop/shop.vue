<template>
<div class="content-wrapper">
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pages-title-text text-center">
                        <h2>Product Grid View</h2>
                        <ul class="text-left">
                            <li><a href="index.html">Home </a></li>
                            <li><span> // </span>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pages-title-end -->
    <!-- collection section start -->
    <section class="collection-area collection-area2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single-colect banner collect-one">
                        <a href="#"><img src="img/collect/4.jpg" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="colect-text">
                        <h4><a href="#">Fashion Collection 2016</a></h4>
                        <h5>
                            big sale of the men 2016 fashion <br />
                            Up To 23% Off!
                        </h5>
                        <a href="#">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                    <div class="collect-img banner margin single-colect">
                        <a href="#"><img src="img/collect/5.jpg" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="collect-img banner single-colect">
                        <a href="#"><img src="img/collect/6.jpg" alt="" /></a>
                    </div>
                    <div class="colect-text">
                        <h4><a href="#">Men’s Collection 2016</a></h4>
                        <p>
                            There are many variations of passages of Lorem Ipsum avalabbut
                            the majority have suffered alteration in some form.
                        </p>
                        <a href="#">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- collection section end -->
    <!-- product-grid-view content section start -->

    <section class="pages products-page section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <sidebar></sidebar>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-9">
                    <div class="right-products">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="section-title clearfix">
                                    <ul>
                                        <li>
                                            <ul class="nav-view">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#grid">
                                                        <i class="mdi mdi-view-module"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#list">
                                                        <i class="mdi mdi-view-list"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sort-by floatright">
                                            Showing 1-9 of 10 Results
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tab-content grid-content">
                                <div class="tab-pane fade in active text-center" id="grid">
                                    <div class="col-xs-12 col-sm-6 col-md-4" v-for="product in getAllProduct" :key="product.id">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <div class="pro-type">
                                                    <span>new</span>
                                                </div>
                                                <a href="#"><img :src="`/img/${product.image}`" alt="Product Title" /></a>
                                                <div class="actions-btn">
                                                    <a href="#"><i class="mdi mdi-cart"></i></a>
                                                    <a href="#" @click.prevent="ViewProduct(product)" data-toggle="modal" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
                                                    <a href="#" @click.prevent="addWishlist(product)"><i class="mdi mdi-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-dsc">
                                                <p>
                                                    <a href="#">{{ product.name }}</a>
                                                </p>
                                                <div class="ratting">
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star-half"></i>
                                                    <i class="mdi mdi-star-outline"></i>
                                                </div>
                                                <span>
                                                    Tk
                                                    {{ product.price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in" id="list">
                                    <div class="col-xs-12" v-for="product in getAllProduct" :key="product.id">
                                        <div class="single-list-view">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="list-img">
                                                        <div class="product-img">
                                                            <div class="pro-type sell">
                                                                <span>sell</span>
                                                            </div>
                                                            <a href="#"><img :src="`/img/${product.image}`" alt="Product Title" /></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-8">
                                                    <div class="list-text">
                                                        <h3>
                                                            {{ product.name }}
                                                        </h3>
                                                        <span>Summer men’s fashion</span>
                                                        <div class="ratting floatright">
                                                            <p>( 27 Rating )</p>
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star-half"></i>
                                                            <i class="mdi mdi-star-outline"></i>
                                                        </div>
                                                        <h5 v-if="product.discount_price">
                                                            <del>
                                                                $
                                                                {{ product.discount_price }}</del>
                                                            <span>
                                                                $
                                                                {{ product.price }}</span>
                                                        </h5>
                                                        <h5 v-else>
                                                            <span>
                                                                $
                                                                {{ product.price }}</span>
                                                        </h5>
                                                        <p>
                                                            {{ product.description }}
                                                        </p>
                                                        <div class="list-btn">
                                                            <a href="#">add to cart</a>
                                                            <a href="#" @click.prevent="addWishlist(product)">wishlist</a>
                                                            <a href="#" @click.prevent="ViewProduct(product)" data-toggle="modal" data-target="#quick-view">zoom</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="pagnation-ul">
                                    <ul class="clearfix">
                                        <li>
                                            <a href="#"><i class="mdi mdi-menu-left"></i></a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li>
                                            <a href="#"><i class="mdi mdi-menu-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-grid-view content section end -->
    <!-- quick view start -->

    <div class="product-details quick-view modal animated zoomInUp" id="quick-view">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="d-table">
                        <div class="d-tablecell">
                            <div class="modal-dialog">
                                <div class="main-view modal-content">
                                    <div class="modal-footer" data-dismiss="modal">
                                        <span>x</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-5 col-md-4">
                                            <div class="quick-image">
                                                <div class="single-quick-image text-center">
                                                    <div class="list-img">
                                                        <div class="product-img tab-content">
                                                            <div class="simpleLens-container tab-pane fade in" id="q-sin-1">
                                                                <div class="pro-type">
                                                                    <span>new</span>
                                                                </div>
                                                                <a class="simpleLens-image" :data-lens-image="`/img/${productForView.image}`" href="#"><img :src="`/img/${productForView.image}`" alt="" class="simpleLens-big-image" /></a>
                                                            </div>
                                                            <div class="simpleLens-container tab-pane activefadein" id="q-sin-2">
                                                                <div class="pro-type sell">
                                                                    <span>sell</span>
                                                                </div>
                                                                <a class="simpleLens-image" :data-lens-image="`/img/${productForView.image}`" href="#"><img :src="`/img/${productForView.image}`" alt="" class="simpleLens-big-image" /></a>
                                                            </div>
                                                            <div class="simpleLens-container tab-pane fade in" id="q-sin-3">
                                                                <div class="pro-type">
                                                                    <span>-15%</span>
                                                                </div>
                                                                <a class="simpleLens-image" :data-lens-image="`/img/${productForView.image}`" href="#"><img :src="`/img/${productForView.image}`" alt="" class="simpleLens-big-image" /></a>
                                                            </div>
                                                            <div class="simpleLens-container tab-pane fade in" id="q-sin-4">
                                                                <div class="pro-type">
                                                                    <span>new</span>
                                                                </div>
                                                                <a class="simpleLens-image" :data-lens-image="`/img/${productForView.image}`" href="#"><img :src="`/img/${productForView.image}`" alt="" class="simpleLens-big-image" /></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="quick-thumb">
                                                    <ul class="product-slider">
                                                        <li>
                                                            <a data-toggle="tab" href="#q-sin-1">
                                                                <img :src="`/img/${productForView.image}`" alt="quick view" />
                                                            </a>
                                                        </li>
                                                        <li class="active">
                                                            <a data-toggle="tab" href="#q-sin-2">
                                                                <img :src="`/img/${productForView.image}`" alt="small image" />
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="tab" href="#q-sin-3">
                                                                <img :src="`/img/${productForView.image}`" alt="small image" />
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="tab" href="#q-sin-4">
                                                                <img :src="`/img/${productForView.image}`" alt="small image" />
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-md-8">
                                            <div class="quick-right">
                                                <div class="list-text">
                                                    <h3>
                                                        {{ productForView.name }}
                                                    </h3>
                                                    <span>Summer men’s fashion</span>
                                                    <div class="ratting floatright">
                                                        <p>( 27 Rating )</p>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star-half"></i>
                                                        <i class="mdi mdi-star-outline"></i>
                                                    </div>
                                                    <h5 v-if="productForView.discount_price">
                                                        <del>
                                                            $
                                                            {{ productForView.discount_price }}</del>
                                                        <span>
                                                            $
                                                            {{ productForView.price }}</span>
                                                    </h5>
                                                    <h5 v-else>
                                                        <span>
                                                            $
                                                            {{ productForView.price }}</span>
                                                    </h5>
                                                    <p>
                                                        {{ productForView.description }}
                                                    </p>
                                                    <div class="all-choose">
                                                        <div class="s-shoose">
                                                            <h5>Color</h5>
                                                            <div class="color-select clearfix">
                                                                <span v-for="c in clr"></span>
                                                            </div>
                                                        </div>
                                                        <div class="s-shoose">
                                                            <h5>size</h5>
                                                            <div class="size-drop">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn">
                                                                        {{ showSizeBtn }}
                                                                    </button>
                                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class=""><i class="mdi mdi-chevron-down"></i></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <a href="#" v-for="s in sz" @click.prevent="ShowSize(s)">{{ s }}</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="s-shoose">
                                                            <h5>qty</h5>
                                                            <form action="#" method="POST">
                                                                <div class="plus-minus">
                                                                    <a class="dec qtybutton">-</a>
                                                                    <input type="text" value="02" name="qtybutton" class="plus-minus-box" />
                                                                    <a class="inc qtybutton">+</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="list-btn">
                                                        <a href="#">add to cart</a>
                                                        <a href="#" @click.prevent="addWishlist(productForView)">wishlist</a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view">zoom</a>
                                                    </div>
                                                    <div class="share-tag clearfix">
                                                        <ul class="blog-share floatleft">
                                                            <li>
                                                                <h5>share</h5>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="mdi mdi-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="mdi mdi-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="mdi mdi-linkedin"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="mdi mdi-vimeo"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="mdi mdi-dribbble"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="mdi mdi-instagram"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- vuetify toaster -->
        <template>
            <v-app>
                <v-snackbar v-model="snackbar">
                    {{ text }}
                </v-snackbar>
            </v-app>
        </template>
    </div>

    <!-- vuetify toaster -->
    <template>
        <v-app>
            <div>
                <v-snackbar v-model="snackbar" :timeout="timeout">
                    {{ text }}
                </v-snackbar>
            </div>

        </v-app>
    </template>
</div>
</template>

<script>
import sidebar from "./productSidebar";
export default {
    data() {
        return {
            currentPage: 1,
            currency: process.env.MIX_APP_CURRENCY,
            wishlist: {
                user_id: "",
                product_id: "",
            },
            productForView: {},
            snackbar: false,
            text: "",
            clr: {},
            sz: {},
            showSizeBtn: "",
            timeout: 2000,
        };
    },
    components: {
        sidebar,
    },
    mounted() {
        this.$store.dispatch("AllProduct", this.currentPage);
    },

    computed: {
        getAllProduct() {
            return this.$store.getters.allProduct;
        },
        user() {
            return this.$store.getters.allUsers;
        },
    },

    methods: {
        addWishlist(data) {
            if (this.user) {
                this.wishlist.user_id = this.user.id;
                this.wishlist.product_id = data.id;
                axios.post("/wishlist", this.wishlist).then((response) => {
                    this.text = "added to wishList";
                    this.snackbar = true;
                });
            } else {
                this.$router.push({
                    name: "UserLogin"
                });
            }
        },

        ViewProduct(data) {
            this.productForView = data;
            this.clr = data.color.split(",");
            this.sz = data.size.split(",");
            this.showSizeBtn = this.sz[0];
        },
        ShowSize(S) {
            this.showSizeBtn = S;
        },
    },
};
</script>
