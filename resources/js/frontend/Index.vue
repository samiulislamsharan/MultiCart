<template>
    <Layout>
        <template v-slot:content>
            <!-- slider-area -->
            <section class="slider-area position-relative">
                <div class="third-slider-active">
                    <div v-for="item in homeBanner" :key="item.id" class="third-slider-item third-slider-bg"
                        data-background="front_assets/img/slider/third_slider_bg.jpg">
                        <div class="container custom-container-two">
                            <div class="third-slider-wrap">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="slider-content">
                                            <h3 class="sub-title" data-animation-in="fadeInUp" data-delay-in=".2"
                                                data-duration-in="1.5">best offer !</h3>
                                            <h2 class="title" data-animation-in="fadeInUp" data-delay-in=".4"
                                                data-duration-in="1.5">{{ item.text }}</h2>
                                            <a :href="item.link" class="btn" data-animation-in="fadeInUp"
                                                data-delay-in=".8" data-duration-in="1.5">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="third-slider-img">
                                            <div class="img-shape"
                                                data-background="front_assets/img/slider/third_slide_shape.png"
                                                data-animation-in="zoomIn" data-delay-in="1" data-duration-in="1.5">
                                            </div>
                                            <img :src="item.image" alt="" class="main-img"
                                                data-animation-in="slideInRight2" data-delay-in="1"
                                                data-duration-in="1.5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider-area-end -->

            <!-- shoes-category-area -->
            <div class="shoes-category-area pt-80 pb-30">
                <div class="container custom-container-two">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="shoes-cat-item mb-50">
                                <div class="thumb mb-30">
                                    <a href="shop-sidebar.html"><img src="front_assets/img/images/shoes_cat_img01.jpg"
                                            alt=""></a>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="shop-sidebar.html">Women Shoes</a></li>
                                        <li><span>18</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="shoes-cat-item mb-50">
                                <div class="thumb mb-30">
                                    <a href="shop-sidebar.html"><img src="front_assets/img/images/shoes_cat_img02.jpg"
                                            alt=""></a>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="shop-sidebar.html">Travelling Shoes</a></li>
                                        <li><span>24</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="shoes-cat-item mb-50">
                                <div class="thumb mb-30">
                                    <a href="shop-sidebar.html"><img src="front_assets/img/images/shoes_cat_img03.jpg"
                                            alt=""></a>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="shop-sidebar.html">Man Shoes</a></li>
                                        <li><span>09</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- shoes-category-area-end -->

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
                                <h5>Category Shoes</h5>
                                <ul class="nav nav-tabs" id="trendingTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="accessories-tab" data-toggle="tab"
                                            href="#accessories" role="tab" aria-controls="accessories"
                                            aria-selected="true">Athletes Shoes</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="bags-tab" data-toggle="tab" href="#bags" role="tab"
                                            aria-controls="bags" aria-selected="false">Shoes</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="bSellers-tab" data-toggle="tab" href="#bSellers"
                                            role="tab" aria-controls="bSellers" aria-selected="false">Haiki
                                            Shoes</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="shirts-tab" data-toggle="tab" href="#shirts" role="tab"
                                            aria-controls="shirts" aria-selected="false">Baby</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="shoesTwo-tab" data-toggle="tab" href="#shoesTwo"
                                            role="tab" aria-controls="shoesTwo" aria-selected="false">Woman</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="travelOut-tab" data-toggle="tab" href="#travelOut"
                                            role="tab" aria-controls="travelOut" aria-selected="false">Travel &
                                            Outdoor</a>
                                    </li>
                                </ul>
                                <p class="offer"><a href="#">Limited-Time Offer!</a></p>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="tab-content tp-tab-content" id="trendingTabContent">
                                <div class="tab-pane show active" id="accessories" role="tabpanel"
                                    aria-labelledby="accessories-tab">
                                    <div class="trending-products-banner banner-animation">
                                        <a href="shop-sidebar.html"><img
                                                src="front_assets/img/images/trending_banner03.jpg" alt=""></a>
                                    </div>
                                    <div class="row trending-product-active">
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product01.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Athletes Shoes</a></h5>
                                                    <p class="price">$67.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product02.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Mountain Shoes</a></h5>
                                                    <p class="price">$45.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product03.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Travelling Shoes</a></h5>
                                                    <p class="price">$29.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product04.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                                    <p class="price">$59.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product05.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                                    <p class="price">$18.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product06.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                                    <p class="price">$12.00</p>
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
                                <div class="tab-pane" id="bags" role="tabpanel" aria-labelledby="bags-tab">
                                    <div class="trending-products-banner banner-animation">
                                        <a href="shop-sidebar.html"><img
                                                src="front_assets/img/images/trending_banner02.jpg" alt=""></a>
                                    </div>
                                    <div class="row trending-product-active">
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product07.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Athletes Shoes</a></h5>
                                                    <p class="price">$67.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product08.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Mountain Shoes</a></h5>
                                                    <p class="price">$45.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product01.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Travelling Shoes</a></h5>
                                                    <p class="price">$29.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product02.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                                    <p class="price">$59.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product03.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                                    <p class="price">$18.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product04.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                                    <p class="price">$12.00</p>
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
                                <div class="tab-pane" id="bSellers" role="tabpanel" aria-labelledby="bSellers-tab">
                                    <div class="trending-products-banner banner-animation">
                                        <a href="shop-sidebar.html"><img src="front_assets/img/images/trending_banner.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="row trending-product-active">
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product05.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women Shoes</a></h5>
                                                    <p class="price">$67.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product06.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                                    <p class="price">$45.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product07.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                                    <p class="price">$29.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product08.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                                    <p class="price">$59.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product01.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                                    <p class="price">$18.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product02.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                                    <p class="price">$12.00</p>
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
                                <div class="tab-pane" id="shirts" role="tabpanel" aria-labelledby="shirts-tab">
                                    <div class="trending-products-banner banner-animation">
                                        <a href="shop-sidebar.html"><img
                                                src="front_assets/img/images/trending_banner02.jpg" alt=""></a>
                                    </div>
                                    <div class="row trending-product-active">
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product03.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women Shoes</a></h5>
                                                    <p class="price">$67.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product04.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                                    <p class="price">$45.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product05.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                                    <p class="price">$29.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product06.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                                    <p class="price">$59.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product07.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                                    <p class="price">$18.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product08.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                                    <p class="price">$12.00</p>
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
                                <div class="tab-pane" id="shoesTwo" role="tabpanel" aria-labelledby="shoesTwo-tab">
                                    <div class="trending-products-banner banner-animation">
                                        <a href="shop-sidebar.html"><img src="front_assets/img/images/trending_banner.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="row trending-product-active">
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product01.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women Shoes</a></h5>
                                                    <p class="price">$67.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product02.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                                    <p class="price">$45.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product03.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                                    <p class="price">$29.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product04.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                                    <p class="price">$59.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product05.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                                    <p class="price">$18.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product06.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                                    <p class="price">$12.00</p>
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
                                <div class="tab-pane" id="travelOut" role="tabpanel" aria-labelledby="travelOut-tab">
                                    <div class="trending-products-banner banner-animation">
                                        <a href="shop-sidebar.html"><img
                                                src="front_assets/img/images/trending_banner02.jpg" alt=""></a>
                                    </div>
                                    <div class="row trending-product-active">
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product07.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women Shoes</a></h5>
                                                    <p class="price">$67.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product08.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                                    <p class="price">$45.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product01.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                                    <p class="price">$29.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product02.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                                    <p class="price">$59.00</p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product03.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                                    <p class="price">$18.00</p>
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
                                        <div class="col">
                                            <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="front_assets/img/product/shoes_product04.jpg" alt="">
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
                                                    <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                                    <p class="price">$12.00</p>
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
                                <button class="active" data-filter="*">Best Sellers</button>
                                <button class="" data-filter=".cat-one">New Products</button>
                                <button class="" data-filter=".cat-two">Sales Products</button>
                            </div>
                        </div>
                    </div>
                    <div class="row new-arrival-active">
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <a href="shop-details.html"><img
                                            src="front_assets/img/product/shoes_arrival_product01.jpg" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">Athletes Shoes</a></h5>
                                    <span class="price">$37.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <div class="discount-tag">- 20%</div>
                                    <a href="shop-details.html"><img
                                            src="front_assets/img/product/shoes_arrival_product02.jpg" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">Mountain Shoes</a></h5>
                                    <span class="price">$25.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-one">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <a href="shop-details.html"><img
                                            src="front_assets/img/product/shoes_arrival_product03.jpg" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">Travelling Shoes</a></h5>
                                    <span class="price">$19.50</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <div class="discount-tag new">New</div>
                                    <a href="shop-details.html"><img
                                            src="front_assets/img/product/shoes_arrival_product04.jpg" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">Women Shoes</a></h5>
                                    <span class="price">$12.90</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <div class="discount-tag">- 20%</div>
                                    <a href="shop-details.html"><img
                                            src="front_assets/img/product/shoes_arrival_product05.jpg" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">Men Shoes</a></h5>
                                    <span class="price">$49.90</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-one">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <div class="discount-tag new">New</div>
                                    <a href="shop-details.html"><img
                                            src="front_assets/img/product/shoes_arrival_product06.jpg" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">Fashion Shoes</a></h5>
                                    <span class="price">$31.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <a href="shop-details.html"><img
                                            src="front_assets/img/product/shoes_arrival_product07.jpg" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">New Shoes</a></h5>
                                    <span class="price">$19.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <div class="discount-tag">- 45%</div>
                                    <a href="shop-details.html"><img
                                            src="front_assets/img/product/shoes_arrival_product08.jpg" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                    <span class="price">$9.99</span>
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
                        <div class="shoes-banner-bg" data-background="front_assets/img/bg/shoes-banner_bg.jpg">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shoes-banner-content">
                                        <h6>Athletes Shoes</h6>
                                        <h2>9 Best <span>Shoes for</span> Standing All Day Review 2025</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shoes-banner-bg" data-background="front_assets/img/bg/shoes-banner_bg.jpg">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shoes-banner-content">
                                        <h6>Athletes Shoes</h6>
                                        <h2>3 Best <span>Shoes for</span> Standing All Day Review 2025</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shoes-banner-bg" data-background="front_assets/img/bg/shoes-banner_bg.jpg">
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
                                <div class="icon"><img src="front_assets/img/icon/promo_icon01.png" alt=""></div>
                                <div class="content">
                                    <h6>payment & delivery</h6>
                                    <p>Delivered, when you receive arrives</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="front_assets/img/icon/promo_icon02.png" alt=""></div>
                                <div class="content">
                                    <h6>Return Product</h6>
                                    <p>Retail, a Product Return Process</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="front_assets/img/icon/promo_icon03.png" alt=""></div>
                                <div class="content">
                                    <h6>money back guarantee</h6>
                                    <p>Options Including 24/7</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="front_assets/img/icon/promo_icon04.png" alt=""></div>
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
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="front_assets/img/instagram/s_insta_post01.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="front_assets/img/instagram/s_insta_post02.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="front_assets/img/instagram/s_insta_post03.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="front_assets/img/instagram/s_insta_post04.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="front_assets/img/instagram/s_insta_post05.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="front_assets/img/instagram/s_insta_post03.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="front_assets/img/instagram/s_insta_post04.jpg" alt="">
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

export default {
    name: "Index",
    components: {
        Layout
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

                console.log(data);
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
