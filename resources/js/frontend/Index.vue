<template>
    <Layout>
        <template v-slot:content="slotProps">

            <!-- home-banner-area -->
            <HomeBanner :homeBanner="homeBanner" />

            <!-- category-area -->
            <HomeCategories :homeCategories="homeCategories" />
            <!-- category-area-end -->

            <!-- trending-product-area -->
            <TrendingProducts :homeCategories="homeCategories" :showActiveClass="showActiveClass"
                :formatPrice="slotProps.formatPrice" :addToCart="slotProps.addToCart" />
            <!-- trending-product-area-end -->

            <!-- new-arrival-area -->
            <NewArrivalProducts :homeProducts="homeProducts" :homeCategories="homeCategories"
                :showActiveClass="showActiveClass" :formatPrice="slotProps.formatPrice" :addToCart="slotProps.addToCart" />
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

            <!-- brand-area -->
            <HomeBrands :homeBrands="homeBrands" />
            <!-- brand-area-end -->
        </template>
    </Layout>
</template>

<script>
import Layout from './Layout.vue';

import axios from 'axios';
import getUrlList from '../provider';

import HomeBanner from './components/HomeBanner.vue';
import HomeBrands from './components/HomeBrands.vue';
import HomeCategories from './components/HomeCategories.vue';
import TrendingProducts from './components/TrendingProducts.vue';
import NewArrivalProducts from './components/NewArrivalProducts.vue';

export default {
    name: 'Index',
    components: {
        Layout,
        HomeBanner,
        HomeBrands,
        HomeCategories,
        TrendingProducts,
        NewArrivalProducts,
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
