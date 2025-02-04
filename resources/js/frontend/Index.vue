<template>
    <Layout>
        <template v-slot:content>

            <!-- home-banner-area -->
            <HomeBanner :homeBanner="homeBanner" />

            <!-- category-area -->
            <HomeCategories :homeCategories="homeCategories" />
            <!-- category-area-end -->

            <!-- trending-product-area -->
            <section class="trending-product-area trending-product-two gray-bg pt-95 pb-100">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="section-title title-style-two text-center mb-50">
                                <h3 class="title">Trending Products</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters trending-product-grid">
                        <div class="col-2">
                            <div class="trending-products-list">
                                <h5>Categories</h5>
                                <ul class="nav nav-tabs" id="trendingTab" role="tablist">
                                    <li v-for="(item, index) in homeCategories.slice(0, 5)" :key="item.id"
                                        class="nav-item" role="presentation">
                                        <a :class="'nav-link ' + showActiveClass(1, index)"
                                            :id="'category-' + item.id + '-tab'" data-toggle="tab"
                                            :href="'#category-' + item.id" role="tab"
                                            :aria-controls="'category-' + item.id" aria-selected="true">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                                <p class="offer"><a href="#">Limited-Time Offer!</a></p>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="tab-content tp-tab-content" id="trendingTabContent">
                                <div v-for="(item, index) in homeCategories.slice(0, 5)" :key="item.id"
                                    :class="'tab-pane ' + showActiveClass(2, index)" :id="'category-' + item.id"
                                    role="tabpanel" :aria-labelledby="'category-' + item.id + '-tab'">
                                    <div class="trending-products-banner banner-animation">
                                        <a href="shop-sidebar.html">
                                            <img :src="item.image" :alt="item.name + '_image'"
                                                style="background-color: lightgray; height: 30rem; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div v-if="item.products.length > 0" class="row trending-product-active">
                                        <div v-for="(item, index) in item.products" :key="item.id" class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img :src="item.image" alt=""
                                                            style="height: 15rem; object-fit: cover;">
                                                    </a>
                                                    <div class="product-overlay-action">
                                                        <ul>
                                                            <li><a href="cart.html"><i class="far fa-heart"></i></a>
                                                            </li>
                                                            <li><a href="shop-details.html"><i
                                                                        class="far fa-eye"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-content">
                                                    <div class="rating">
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                    <h5><a href="shop-details.html">{{ item.name }}</a></h5>
                                                    <p class="price">{{ 'BDT ' + item.product_attributes[0].price }}</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                            <li class="limited-time"><a href="#">Limited-Time
                                                                    Offer!</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- trending-product-area-end -->

            <!-- new-arrival-area -->
            <section class="new-arrival-area pt-95 pb-45">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="section-title title-style-two text-center mb-45">
                                <h3 class="title">New Arrival Collection</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="new-arrival-nav mb-35">
                                <button>Best Sellers</button>
                                <button v-for="(item, index) in homeCategories" :key="item.id"
                                    :class="showActiveClass(1, index)" :data-filter="'.category-' + item.id">
                                    {{ item.name }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row new-arrival-active">
                        <div v-for="item in homeProducts" :key="item.id"
                            :class="'col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer ' + 'category-' + item.category_id">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <!-- <div class="discount-tag">-20%</div> -->
                                    <div class="discount-tag new">New</div>
                                    <a href="shop-details.html"><img :src="item.image" :alt="item.name + '_image'"
                                            style="height: 15rem; object-fit: cover;"></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">{{ item.name }}</a></h5>
                                    <span class="price">{{ 'BDT ' + item.product_attributes[0].price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- new-arrival-area-end -->

            <!-- shoes-banner-area -->
            <section class="shoes-banner-area">
                <div class="container">
                    <div class="shoes-banner-active">
                        <div class="shoes-banner-bg" data-background="/front_assets/img/bg/shoes-banner_bg.jpg">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shoes-banner-content">
                                        <h6>Athletes Shoes</h6>
                                        <h2>9 Best <span>Shoes for</span> Standing All Day Review 2025</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shoes-banner-bg" data-background="/front_assets/img/bg/shoes-banner_bg.jpg">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shoes-banner-content">
                                        <h6>Athletes Shoes</h6>
                                        <h2>3 Best <span>Shoes for</span> Standing All Day Review 2025</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shoes-banner-bg" data-background="/front_assets/img/bg/shoes-banner_bg.jpg">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shoes-banner-content">
                                        <h6>Athletes Shoes</h6>
                                        <h2>8 Best <span>Shoes for</span> Standing All Day Review 2025</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- shoes-banner-area-end -->

            <!-- promo-services -->
            <section class="promo-services pt-70 pb-25">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="/front_assets/img/icon/promo_icon01.png" alt=""></div>
                                <div class="content">
                                    <h6>payment & delivery</h6>
                                    <p>Delivered, when you receive arrives</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="/front_assets/img/icon/promo_icon02.png" alt=""></div>
                                <div class="content">
                                    <h6>Return Product</h6>
                                    <p>Retail, a Product Return Process</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="/front_assets/img/icon/promo_icon03.png" alt=""></div>
                                <div class="content">
                                    <h6>money back guarantee</h6>
                                    <p>Options Including 24/7</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="/front_assets/img/icon/promo_icon04.png" alt=""></div>
                                <div class="content">
                                    <h6>Quality support</h6>
                                    <p>Support Options Including 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- promo-services-end -->

            <!-- instagram-post-area -->
            <div class="instagram-post-area">
                <div class="container-fluid p-0 fix">
                    <div class="row no-gutters insta-active">
                        <div v-for="item in homeBrands" :key="item.id" class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img :src="item.image" :alt="item.text + '_image'"
                                        style="height: 20rem ; object-fit: contain;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- instagram-post-area-end -->
        </template>
    </Layout>
</template>

<script>
import Layout from './Layout.vue';

import axios from 'axios';
import getUrlList from '../provider';

import HomeBanner from './components/HomeBanner.vue';
import HomeCategories from './components/HomeCategories.vue';

export default {
    name: 'Index',
    components: {
        Layout,
        HomeBanner,
        HomeCategories,
    },
    data() {
        return {
            homeBanner: [],
            homeCategories: [],
            homeBrands: [],
            homeProducts: [],
        }
    },
    mounted() {
        this.getHomeData();
    },
    methods: {
        async getHomeData() {
            try {
                let data = await axios.get(getUrlList().home);

                if (data.status == 200 && data.data.data.data.banner.length > 0) {
                    this.homeBanner = data.data.data.data.banner;
                    this.homeCategories = data.data.data.data.categories;
                    this.homeBrands = data.data.data.data.brands;
                    this.homeProducts = data.data.data.data.products;
                } else {
                    console.log('No data found');
                }
            } catch (error) {
                console.log(error);
            }
        },
        showActiveClass(type, index) {
            if (type == 1 && index == 0) {
                return 'active';
            } else if (type == 2 && index == 0) {
                return 'show active';
            } else {
                return '';
            }
        }
    }
}
</script>
