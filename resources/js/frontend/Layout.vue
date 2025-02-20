<template>
    <!-- preloader  -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="header-style-two">
        <div id="sticky-header" class="main-header transparent-header menu-area">
            <div class="container custom-container-two">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <!-- brand logo -->
                                <div class="logo">
                                    <router-link :to="'/'" class="main-logo">
                                        <img src="/front_assets/img/logo/fw_logo.png" alt="Logo">
                                    </router-link>
                                    <router-link :to="'/'" class="sticky-logo">
                                        <img src="/front_assets/img/logo/fw_logo.png" alt="Logo">
                                    </router-link>
                                </div>
                                <!-- brand logo end -->

                                <!-- navbar -->
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="active">
                                            <router-link :to="'/'">Home</router-link>
                                        </li>
                                        <li v-for="item in headerCategories" :key="item.id" class="has--mega--menu">
                                            <router-link :to="'/category/' + item.slug">{{ item.name }}</router-link>
                                            <ul class="mega-menu">
                                                <li class="mega-menu-wrap">
                                                    <ul class="mega-menu-col">
                                                        <li class="mega-title">
                                                            <router-link :to="'/category/' + item.slug">{{ item.name }}
                                                            </router-link>
                                                        </li>
                                                        <li v-for="subitem in item.subcategories" :key="subitem.id">
                                                            <router-link :to="'/category/' + subitem.slug">{{
                                                                subitem.name }}</router-link>
                                                        </li>
                                                    </ul>
                                                    <ul class="mega-menu-col sub-cat-post">
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <img :src="item.image" alt="">
                                                                <span class="btn">ALL {{ item.name }}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <!-- navbar end -->

                                <!-- cart -->
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="header-search">
                                            <a href="#" data-toggle="modal" data-target="#search-modal">
                                                <i class="flaticon-search"></i>
                                            </a>
                                        </li>
                                        <li class="header-shop-cart">
                                            <a href="#">
                                                <i class="flaticon-shopping-bag"></i>
                                                <span>0</span>
                                            </a>
                                            <ul class="minicart">
                                                <li class="d-flex align-items-start">
                                                    <div class="cart-img">
                                                        <a href="#">
                                                            <img src="/front_assets/img/product/cart_p01.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4><a href="#">Exclusive Winter Jackets</a></h4>
                                                        <div class="cart-price">
                                                            <span class="new">$229.9</span>
                                                            <span><del>$229.9</del></span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon">
                                                        <a href="#"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </li>
                                                <li class="d-flex align-items-start">
                                                    <div class="cart-img">
                                                        <a href="#">
                                                            <img src="/front_assets/img/product/cart_p02.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4><a href="#">Winter Jackets For Women</a></h4>
                                                        <div class="cart-price">
                                                            <span class="new">$229.9</span>
                                                            <span><del>$229.9</del></span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon">
                                                        <a href="#"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="total-price">
                                                        <span class="f-left">Total:</span>
                                                        <span class="f-right">$239.9</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkout-link">
                                                        <a href="#">Shopping Cart</a>
                                                        <a class="black-color" href="#">Checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="header-profile"><a href="#"><i class="flaticon-user-profile"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- cart end -->
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="flaticon-targeting-cross"></i></div>
                            <nav class="menu-box">
                                <div class="nav-logo">
                                    <a href="index.html">
                                        <img src="/front_assets/img/logo/logo.png" alt="" title="">
                                    </a>
                                </div>
                                <div class="menu-outer">
                                    <ul class="navigation">
                                        <li class="active">
                                            <a href="/">Home</a>
                                        </li>
                                        <li v-for="item in headerCategories" :key="item.id"
                                            class="menu-item-has-children">
                                            <a href="#">{{ item.name }}</a>
                                            <ul class="submenu">
                                                <li v-for="subitem in item.subcategories" :key="subitem.id">
                                                    <a href="shop.html">{{ subitem.name }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Search here...">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Search-end -->

        <!-- off-canvas-start -->
        <div class="sidebar-toggle-btn">
            <a href="#" class="navSidebar-button">
                <img src="/front_assets/img/icon/sidebar_toggle_icon.png" alt="">
            </a>
        </div>
        <div class="sidebar-off-canvas info-group">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-widget scroll">
                <div class="sidebar-widget-container">
                    <div class="off-canvas-heading">
                        <a href="#" class="close-side-widget">
                            <span class="flaticon-targeting-cross"></span>
                        </a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo mb-30">
                                    <a href="index.html"><img src="/front_assets/img/logo/logo.png" alt=""></a>
                                </div>
                                <div class="content-box">
                                    <p>Multi Vendor E-Commerce
                                    </p>
                                </div>
                                <div class="contact-info">
                                    <h4 class="title">CONTACT US</h4>
                                    <ul>
                                        <li>
                                            <span class="flaticon-phone-call"></span>
                                            <a href="tel:+880-1716-571811">+880 1716 571811</a>
                                        </li>
                                        <li>
                                            <span class="flaticon-email"></span>
                                            <a href="mailto:multicart@info.com">multicart@info.com</a>
                                        </li>
                                        <li>
                                            <span class="flaticon-place"></span>
                                            71 Park Lan Street 2355 NY
                                        </li>
                                    </ul>
                                </div>
                                <div class="oc-newsletter">
                                    <h4 class="title">NEWSLETTER</h4>
                                    <p>Fill your email below to subscribe to my newsletter</p>
                                    <form action="#">
                                        <input type="email" placeholder="Email...">
                                        <button class="btn">Subscribe</button>
                                    </form>
                                </div>
                                <div class="oc-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    </ul>
                                </div>
                                <div class="oc-bottom">
                                    <div class="currency">
                                        <form action="#">
                                            <label>Currency</label>
                                            <select name="select">
                                                <option value="">USD</option>
                                                <option value="">AUE</option>
                                                <option value="">SAR</option>
                                                <option value="">INR</option>
                                                <option selected value="">BDT</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="language">
                                        <form action="#">
                                            <label>Language</label>
                                            <select name="select">
                                                <option value="">English</option>
                                                <option value="">Spanish</option>
                                                <option value="">Turkish</option>
                                                <option value="">Russian</option>
                                                <option value="">Chinese</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- off-canvas-end -->

    </header>
    <!-- header-area-end -->

    <!-- main-area -->
    <main>
        <slot name="content"></slot>
    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    <footer class="dark-bg pt-55 pb-80">
        <div class="container">
            <div class="footer-top-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-logo">
                            <a href="index.html"><img src="/front_assets/img/logo/w_logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-middle-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-link-wrap">
                            <nav class="menu-links">
                                <ul>
                                    <li><a href="about-us.html">About us</a></li>
                                    <li><a href="shop-sidebar.html">Store</a></li>
                                    <li><a href="contact.html">Locations</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact.html">Support</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Faqs</a></li>
                                </ul>
                            </nav>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-text">
                            <p>&copy; 2025 <a href="index.html">MultiCart</a>. All Rights Reserved | BD (+880) 1716
                                571811
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pay-method-img">
                            <img src="/front_assets/img/images/payment_method_img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    <div id="scripts"></div>
</template>

<!-- JS here -->
<script>
import axios from 'axios';
import getUrlList from '../provider.js';

export default {
    name: 'Layout',
    data() {
        return {
            result: [],
            headerCategories: [],
            user_info: {
                'user_id': '',
                'auth': false
            },
            cartCount: 0,
            cartProducts: [],
            cartTotal: 0,
        }
    },
    mounted() {
        var src = [
            '/front_assets/js/popper.min.js',
            '/front_assets/js/bootstrap.min.js',
            '/front_assets/js/isotope.pkgd.min.js',
            '/front_assets/js/imagesloaded.pkgd.min.js',
            '/front_assets/js/jquery.magnific-popup.min.js',
            '/front_assets/js/jquery.mCustomScrollbar.concat.min.js',
            '/front_assets/js/bootstrap-datepicker.min.js',
            '/front_assets/js/jquery.nice-select.min.js',
            '/front_assets/js/jquery.countdown.min.js',
            '/front_assets/js/swiper-bundle.min.js',
            '/front_assets/js/jarallax.min.js',
            '/front_assets/js/slick.min.js',
            '/front_assets/js/wow.min.js',
            '/front_assets/js/nav-tool.js',
            '/front_assets/js/plugins.js',
            '/front_assets/js/main.js',
        ];

        for (var i = 0; i < src.length; i++) {
            const script = document.createElement('script');
            script.src = src[i];
            script.async = false;
            document.getElementById('scripts').appendChild(script);
        }

        this.getCategories();
        this.getUser();
        this.getCartData();
    },
    methods: {
        async removeFromCart(product_id, product_attr_id, quantity) {
            try {
                let data = await axios.post(
                    getUrlList().remove_from_cart,
                    {
                        'token': this.user_info.user_id,
                        'auth': this.user_info.auth,
                        'product_id': product_id,
                        'product_attr_id': product_attr_id,
                        'quantity': quantity,
                    }
                );

                if (data.status == 200) {
                    this.getCartData();
                }
                else {
                    console.error('No data found');
                }
            }
            catch (error) {
                console.error(error);
            }
        },
        async addToCart(product_id, product_attr_id, quantity) {
            try {
                let data = await axios.post(
                    getUrlList().add_to_cart,
                    {
                        'token': this.user_info.user_id,
                        'auth': this.user_info.auth,
                        'product_id': product_id,
                        'product_attr_id': product_attr_id,
                        'quantity': quantity,
                    }
                );

                if (data.status == 200) {
                    this.getCartData();
                }
                else {
                    console.error('No data found');
                }
            }
            catch (error) {
                console.error(error);
            }
        },
        async getCartData() {
            try {
                let data = await axios.post(
                    getUrlList().get_cart_data,
                    {
                        'token': this.user_info.user_id,
                        'auth': this.user_info.auth,
                    }
                );

                if (data.status == 200) {
                    this.cartCount = data.data.data.data.length;
                    this.cartProducts = data.data.data.data;
                }
                else {
                    console.error('No data found');
                }
            }
            catch (error) {
                console.error(error);
            }
        },
        async getUser() {
            if (localStorage.getItem('user_info')) {
                var user = localStorage.getItem('user_info');
                var testUser = JSON.parse(user);

                this.user_info.user_id = testUser.user_id;

                this.getUserData();
            }
        },
        async getUserData() {
            try {
                let userData = await axios.post(
                    getUrlList().get_user_data,
                    {
                        'token': this.user_info.user_id
                    }
                );

                if (userData.status == 200) {
                    if (userData.data.data.data.user_type == 1) {
                        this.user_info.auth = true;
                        this.user_info.user_id = userData.data.data.data.token;

                        localStorage.setItem('user_info', JSON.stringify(this.user_info));
                    }
                    else {
                        this.user_info.auth = false;
                        this.user_info.user_id = userData.data.data.data.token;

                        localStorage.setItem('user_info', JSON.stringify(this.user_info));
                    }
                }
                else {
                    console.error('No data found');
                }
            }
            catch (error) {
                console.error(error);
            }
        },
        async getCategories() {
            try {
                let data = await axios.get(getUrlList().header_categories);

                if (data.status == 200 && data.data.data.data.categories.length > 0) {
                    this.headerCategories = data.data.data.data.categories;
                } else {
                    console.error('No data found');
                }
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>
