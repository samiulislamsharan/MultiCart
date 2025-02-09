<template>
    <Layout>
        <template v-slot:content>
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg" data-background="/front_assets/img/bg/breadcrumb_bg01.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2>Shop Sidebar</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- shop-area -->
            <section class="shop-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="shop-top-meta mb-35">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="shop-top-left">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="flaticon-menu"></i> FILTER</a>
                                                </li>
                                                <li>Showing 1 &#45; 9 of 80 results</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="shop-top-right">
                                            <form action="#">
                                                <select name="select">
                                                    <option value="">Sort by newness</option>
                                                    <option>Free Shipping</option>
                                                    <option>Best Match</option>
                                                    <option>Newest Item</option>
                                                    <option>Size A - Z</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div v-for="item in products" :key="item.id" class="col-xl-4 col-sm-6">
                                    <div class="new-arrival-item text-center mb-50">
                                        <div class="thumb mb-25">
                                            <a href="shop-details.html">
                                                <img :src="item.image" :alt="item.name + ' image'"
                                                    style="background-color: lightgray; height: 15rem; object-fit: cover;">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li>
                                                        <a href="cart.html" title="Add to wishlist">
                                                            <i class="far fa-heart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-details.html" title="View product">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-details.html" title="Add to cart">
                                                            <i class="flaticon-shopping-bag"></i>
                                                        </a>
                                                    </li>
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
                            <div class="pagination-wrap">
                                <ul>
                                    <li class="prev"><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <aside class="shop-sidebar">
                                <div class="widget side-search-bar">
                                    <form action="#">
                                        <input type="text">
                                        <button><i class="flaticon-search"></i></button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Product Categories</h4>
                                    <div class="shop-cat-list">
                                        <ul>
                                            <li v-for="(item, index) in categories" :key="item.id">
                                                <RouterLink :to="'/category/' + item.slug">{{ item.name }}</RouterLink>
                                                <!-- <span v-if="categoriesProductCount[index]"
                                                    :key="categoriesProductCount[index].id">
                                                    {{ '(' + categoriesProductCount[index].products_count + ')' }}
                                                </span> -->
                                                <span>(0)</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Price Filter</h4>
                                    <div class="price_filter">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <span>Price :</span>
                                            <input v-model="priceRange" type="text" id="amount" name="price"
                                                placeholder="Add Your Price" />
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Product Brand</h4>
                                    <div class="sidebar-brand-list">
                                        <ul>
                                            <li v-for="item in brands" :key="item.id"
                                                v-on:click="addDataAttr('brand', item.id)">
                                                <a :class="this.brand.includes(item.id) ? brandColor : ''"
                                                    href="javascript:void(0);">
                                                    {{ item.text }}
                                                    <i class="fas fa-angle-double-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div v-for="item in attributes" :key="item.id" class="widget">
                                    <h4 class="widget-title">{{ item.attribute.name }}</h4>
                                    <div class="sidebar-brand-list">
                                        <ul>
                                            <li v-for="subitem in item.attribute.values" :key="subitem.id"
                                                v-on:click="addDataAttr('attribute', subitem.id)">
                                                <a :class="this.attribute.includes(subitem.id) ? brandColor : ''"
                                                    href="javascript:void(0);">
                                                    {{ subitem.value }}
                                                    <i class="fas fa-angle-double-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget has-border">
                                    <div class="sidebar-product-size mb-30">
                                        <h4 class="widget-title">Product Size</h4>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li v-for="item in sizes" :key="item.id"
                                                    v-on:click="addDataAttr('size', item.id)" class="shadow">
                                                    <a :class="this.size.includes(item.id) ? sizeColor : ''"
                                                        href="javascript:void(0);">
                                                        {{ item.text }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sidebar-product-color">
                                        <h4 class="widget-title">Color</h4>
                                        <div class="shop-color-list">
                                            <ul>
                                                <li v-for="item in colors" :key="item.id"
                                                    v-on:click="addDataAttr('color', item.id)"
                                                    :style="{ backgroundColor: item.value }"
                                                    :class="this.color.includes(item.id) ? colorColor + ' shadow m-1 p-3' : 'border shadow m-1 p-3'"
                                                    :title="item.text">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="cart-coupon mt-4">
                                        <form action="#">
                                            <button class="btn w-100 shadow-lg">
                                                <span class="fas fa-filter"></span> Filter
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Top Items</h4>
                                    <div class="sidebar-product-list">
                                        <ul>
                                            <li>
                                                <div class="sidebar-product-thumb">
                                                    <a href="#">
                                                        <img src="/front_assets/img/product/sidebar_product01.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="sidebar-product-content">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <h5><a href="#">Woman T-shirt</a></h5>
                                                    <span>$ 39.00</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-area-end -->
        </template>
    </Layout>
</template>

<script>
import Layout from './Layout.vue';
import axios from 'axios';
import getUrlList from '../provider.js';
import { useRoute } from 'vue-router';

export default {
    name: 'Category',
    components: {
        Layout
    },
    data() {
        return {
            categories: [],
            products: [],
            brands: [],
            colors: [],
            sizes: [],
            attributes: [],
            slug: '',
            category: '',
            lowPrice: '',
            highPrice: '',
            categoriesProductCount: [],
            priceRange: '',
            brand: [],
            size: [],
            color: [],
            attribute: [],
            brandColor: 'brand-color',
            sizeColor: 'size-color',
            colorColor: 'color-color',
        }
    },
    watch: {
        '$route'() {
            this.getProducts();
        }
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        addDataAttr(type, value) {
            if (type == 'brand') {
                if (this.checkArray(type, value)) {
                    this.brand.splice(this.brand.indexOf(value), 1);
                } else {
                    this.brand.push(value);
                }
                console.log(this.brand);
            }
            else if (type == 'size') {
                if (this.checkArray(type, value)) {
                    this.size.splice(this.size.indexOf(value), 1);
                } else {
                    this.size.push(value);
                }
                console.log(this.size);
            }
            else if (type == 'color') {
                if (this.checkArray(type, value)) {
                    this.color.splice(this.color.indexOf(value), 1);
                } else {
                    this.color.push(value);
                }
                console.log(this.color);
            }
        },
        checkArray(type, value) {
            if (type == 'brand') {
                return this.brand.includes(value);
            }
            else if (type == 'size') {
                return this.size.includes(value);
            }
            else if (type == 'color') {
                return this.color.includes(value);
            }
        },
        async getProducts() {
            try {
                const route = useRoute();
                this.slug = this.$route.params.slug;

                let data = await axios.get(getUrlList().category + '/' + this.slug);

                if (this.slug == '' || this.slug == undefined || this.slug == null) {
                    this.$router.push({ name: 'Index' });
                } else {
                    if (data.status == 200 && data.data.data.data.categories.length > 0) {
                        this.categories = data.data.data.data.categories;
                        this.products = data.data.data.data.products.data;
                        this.brands = data.data.data.data.brands;
                        this.colors = data.data.data.data.colors;
                        this.sizes = data.data.data.data.sizes;
                        this.attributes = data.data.data.data.attributes;
                        this.$refs.lowPrice.value = data.data.data.data.lowPrice;
                        this.$refs.highPrice.value = data.data.data.data.highPrice;
                        this.categoriesProductCount = data.data.data.data.categories_product_count;
                    } else {
                        console.log('No data found');
                    }
                }
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>

<style>
.brand-color::before {
    background-color: #ff5400;
}

.size-color {
    background-color: #ff5400;
    border-color: #ff5400 !important;
    color: white !important;
}

.color-color {
    border: #ff5400 1.5px solid;
    transition: all 0.2s ease;
}
</style>
