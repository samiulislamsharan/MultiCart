<template>
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
                            <li v-for="(item, index) in homeCategories.slice(0, 5)" :key="item.id" class="nav-item"
                                role="presentation">
                                <a :class="'nav-link ' + showActiveClass(1, index)" :id="'category-' + item.id + '-tab'"
                                    data-toggle="tab" :href="'#category-' + item.id" role="tab"
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
                            :class="'tab-pane ' + showActiveClass(2, index)" :id="'category-' + item.id" role="tabpanel"
                            :aria-labelledby="'category-' + item.id + '-tab'">
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
                                                <img :src="item.image" alt="" style="height: 15rem; object-fit: cover;">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li>
                                                        <a href="cart.html"><i class="far fa-heart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-details.html"><i class="far fa-eye"></i></a>
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
                                            <p class="price">{{ 'BDT ' + formatPrice(item.product_attributes[0].price)
                                                }}
                                            </p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time">
                                                        <a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart">
                                            <a @click="addToCart(item.id, item.product_attributes[0].id, 1)"
                                                href="javascript:void(0)">add to cart</a>
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
</template>
<script>
export default {
    props: {
        homeCategories: {
            type: Array,
            required: true
        },
        showActiveClass: {
            type: Function,
            required: true
        },
        formatPrice: {
            type: Function,
            required: true
        },
        addToCart: {
            type: Function,
            required: true
        }
    }
}
</script>
