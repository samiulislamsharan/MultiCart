<template>
    <Layout>
        <template v-slot:content="slotProps">
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
                                                <li>
                                                    {{ 'Showing ' + productCount.from + ' &#45; ' + productCount.to +
                                                        ' of ' + productCount.total + ' results' }}
                                                </li>
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
                            <div v-if="products.length > 0" class="row">
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
                                                        <a @click="slotProps.addToCart(item.id, item.product_attributes[0].id, 1)"
                                                            href="javascript:void(0)" title="Add to cart">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="shop-details.html">{{ item.name }}</a></h5>
                                            <span class="price">
                                                {{ 'BDT ' + formatPrice(item.product_attributes[0].price) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="center-div ">
                                <h1>Woops! Found Nothing.</h1>
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
                                            <input ref="lowPrice" @keypress="isNumber($event)" type="text" id="lowPrice"
                                                class="price-range-form" placeholder="Min" />
                                            <span class="px-2">&#45;</span>
                                            <input ref="highPrice" @keypress="isNumber($event)" type="text"
                                                id="highPrice" class="price-range-form" placeholder="Max" />
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
                                            <button v-on:click="getProducts" type="button" class="btn w-100 shadow-lg">
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
        Layout,
    },
    props: {
        addToCart: {
            type: Function,
            required: true
        },
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
            productCount: {
                total: 0,
                per_page: 0,
                current_page: 0,
                last_page: 0,
                from: 0,
                to: 0,
            },
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
        formatPrice(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        isNumber(event) {
            const charCode = (event.which) ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 46) {
                event.preventDefault();
            }
        },
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
            else if (type == 'attribute') {
                if (this.checkArray(type, value)) {
                    this.attribute.splice(this.attribute.indexOf(value), 1);
                } else {
                    this.attribute.push(value);
                }
                console.log(this.attribute);
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
            else if (type == 'attribute') {
                return this.attribute.includes(value);
            }
        },
        async getProducts() {
            try {
                this.slug = this.$route.params.slug;

                let data = await axios.post(getUrlList().category, {
                    "slug": this.slug,
                    "attribute": this.attribute,
                    "lowPrice": this.$refs.lowPrice.value,
                    "highPrice": this.$refs.highPrice.value,
                    "brand": this.brand,
                    "size": this.size,
                    "color": this.color,
                });

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
                        this.productCount.from = data.data.data.data.products.from;
                        this.productCount.to = data.data.data.data.products.to;
                        this.productCount.total = data.data.data.data.products.total;
                        this.productCount.per_page = data.data.data.data.products.per_page;
                        this.productCount.current_page = data.data.data.data.products.current_page;
                        this.productCount.last_page = data.data.data.data.products.last_page;
                    } else {
                        this.products = [];
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

.price-range-form {
    border: none;
    background: #ecf0f1;
    color: #878686;
    padding: 10px 20px;
}

.center-div {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
}
</style>
