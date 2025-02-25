<template>
    <Layout>
        <template v-slot:content="slotProps">
            <!-- breadcrumb-area -->
            <div class="breadcrumb-area breadcrumb-style-two"
                data-background="/front_assets/img/bg/s_breadcrumb_bg01.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="previous-product">
                                <a href="shop-details.html"><i class="fas fa-angle-left"></i> previous product</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="shop.html">Winter 20</a></li>
                                        <li class="breadcrumb-item"><a href="shop.html">Women</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Tracker Jacket</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="next-product">
                                <a href="shop-details.html">Next product <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- shop-details-area -->
            <section class="shop-details-area pt-100 pb-95">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="shop-details-flex-wrap">
                                <div class="shop-details-nav-wrap">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="item-one-tab" data-toggle="tab"
                                                href="#item-one" role="tab" aria-controls="item-one"
                                                aria-selected="true"><img
                                                    src="/front_assets/img/product/sd_nav_img01.jpg" alt=""></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="item-two-tab" data-toggle="tab" href="#item-two"
                                                role="tab" aria-controls="item-two" aria-selected="false"><img
                                                    src="/front_assets/img/product/sd_nav_img02.jpg" alt=""></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="item-three-tab" data-toggle="tab" href="#item-three"
                                                role="tab" aria-controls="item-three" aria-selected="false"><img
                                                    src="/front_assets/img/product/sd_nav_img03.jpg" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="shop-details-img-wrap">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="item-one" role="tabpanel"
                                            aria-labelledby="item-one-tab">
                                            <div class="shop-details-img">
                                                <img src="/front_assets/img/product/shop_details_img01.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="item-two" role="tabpanel"
                                            aria-labelledby="item-two-tab">
                                            <div class="shop-details-img">
                                                <img src="/front_assets/img/product/shop_details_img02.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="item-three" role="tabpanel"
                                            aria-labelledby="item-three-tab">
                                            <div class="shop-details-img">
                                                <img src="/front_assets/img/product/shop_details_img03.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="shop-details-content">
                                <a href="#" class="product-cat">Tracker Jacket</a>
                                <h3 class="title">Woman Tracker Jacket</h3>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="style-name">Style Name : TN-WI56-OMTJ-CqTKJ-09#</p>
                                <div class="price">Price : $ 29.00</div>
                                <div class="product-details-info">
                                    <span>Size <a href="#">Guide</a></span>
                                    <div class="sidebar-product-size mb-30">
                                        <h4 class="widget-title">Product Size</h4>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li><a href="#">S</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                                <li><a href="#">XXL</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sidebar-product-color">
                                        <h4 class="widget-title">Color</h4>
                                        <div class="shop-color-list">
                                            <ul>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="perched-info">
                                    <div class="cart-plus-minus">
                                        <form action="#" class="num-block">
                                            <input type="text" class="in-num" value="1" readonly="">
                                            <div class="qtybutton-box">
                                                <span class="plus"><img src="/front_assets/img/icon/plus.png"
                                                        alt=""></span>
                                                <span class="minus dis"><img src="/front_assets/img/icon/minus.png"
                                                        alt=""></span>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="#" class="btn">add to cart</a>
                                    <div class="wishlist-compare">
                                        <ul>
                                            <li><a href="#"><i class="far fa-heart"></i> Add to Wishlist</a></li>
                                            <li><a href="#"><i class="fas fa-retweet"></i> Add to Compare List</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details-share">
                                    <ul>
                                        <li>Share :</li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-desc-wrap">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab"
                                            href="#description" role="tab" aria-controls="description"
                                            aria-selected="true">Description Guide</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews"
                                            role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-desc-title mb-30">
                                            <h4 class="title">Additional information :</h4>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                            nisi
                                            ut aliquip ex ea commodo consequat. Duis
                                            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint
                                            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                            anim
                                            id est laborum.</p>
                                        <p>The purpose of lorem ipsum is to create a natural looking block of text
                                            (sentence, paragraph, page, etc.) that doesn't
                                            distract from the layout. A practice not without controversy, laying out
                                            pages
                                            with meaningless filler text can be very
                                            useful when the focus is meant to be on design, not content.</p>
                                        <div class="color-size-info">
                                            <ul>
                                                <li><span>COLOR :</span> Black, Gray</li>
                                                <li><span>SIZE :</span> XS, S, M, L</li>
                                            </ul>
                                        </div>
                                        <div class="additional-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Size Name</th>
                                                            <td>28</td>
                                                            <td>49</td>
                                                            <td>36</td>
                                                            <td>55</td>
                                                            <td>44</td>
                                                            <td>34</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Waist Stretch</th>
                                                            <td>19</td>
                                                            <td>38</td>
                                                            <td>31</td>
                                                            <td>55</td>
                                                            <td>44</td>
                                                            <td>34</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Hip (7½” below from waist)</th>
                                                            <td>11</td>
                                                            <td>18</td>
                                                            <td>21</td>
                                                            <td>55</td>
                                                            <td>44</td>
                                                            <td>34</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">length (Out seam)</th>
                                                            <td>28</td>
                                                            <td>31</td>
                                                            <td>19</td>
                                                            <td>55</td>
                                                            <td>44</td>
                                                            <td>34</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <p>The purpose of lorem ipsum is to create a natural looking block of text
                                            (sentence, paragraph, page, etc.) that doesn't
                                            distract from the layout. A practice not without controversy, laying out
                                            pages
                                            with meaningless filler text can be very
                                            useful when the focus is meant to be on design, not content.</p>
                                    </div>
                                    <div class="tab-pane fade" id="reviews" role="tabpanel"
                                        aria-labelledby="reviews-tab">
                                        <div class="product-desc-title mb-30">
                                            <h4 class="title">Reviews (0) :</h4>
                                        </div>
                                        <p>Your email address will not be published. Required fields are marked</p>
                                        <p class="adara-review-title">Be the first to review “Adara”</p>
                                        <div class="review-rating">
                                            <span>Your rating *</span>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <form action="#" class="comment-form review-form">
                                            <span>Your review *</span>
                                            <textarea name="message" id="comment-message"
                                                placeholder="Your Comment"></textarea>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Your Name*">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" placeholder="Your Email*">
                                                </div>
                                            </div>
                                            <div class="comment-check-box">
                                                <input type="checkbox" id="comment-check">
                                                <label for="comment-check">Save my name and email in this browser for
                                                    the
                                                    next time I comment.</label>
                                            </div>
                                            <button class="btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-product-wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="related-product-title">
                                    <h4 class="title">You May Also Like...</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row related-product-active">
                            <div class="col-xl-3">
                                <div class="new-arrival-item text-center">
                                    <div class="thumb mb-25">
                                        <a href="shop-details.html"><img
                                                src="/front_assets/img/product/n_arrival_product01.jpg" alt=""></a>
                                        <div class="product-overlay-action">
                                            <ul>
                                                <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5><a href="shop-details.html">Bomber in Cotton</a></h5>
                                        <span class="price">$37.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="new-arrival-item text-center">
                                    <div class="thumb mb-25">
                                        <div class="discount-tag">- 20%</div>
                                        <a href="shop-details.html"><img
                                                src="/front_assets/img/product/n_arrival_product02.jpg" alt=""></a>
                                        <div class="product-overlay-action">
                                            <ul>
                                                <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                        <span class="price">$25.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="new-arrival-item text-center">
                                    <div class="thumb mb-25">
                                        <a href="shop-details.html"><img
                                                src="/front_assets/img/product/n_arrival_product03.jpg" alt=""></a>
                                        <div class="product-overlay-action">
                                            <ul>
                                                <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                        <span class="price">$19.50</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="new-arrival-item text-center">
                                    <div class="thumb mb-25">
                                        <div class="discount-tag new">New</div>
                                        <a href="shop-details.html"><img
                                                src="/front_assets/img/product/n_arrival_product04.jpg" alt=""></a>
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
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-details-area-end -->
        </template>
    </Layout>
</template>

<script>
import Layout from './Layout.vue';
import axios from 'axios';
import getUrlList from '../provider.js';

export default {
    name: 'Product',
    components: {
        Layout,
    },
    props: {},
    data() {
        return {
            slug: '',
            item_code: '',
            product: {
                product_attributes: [
                    price => ''
                ],
            },
            images: [],
            colors: [],
            sizes: [],
            uniqueColors: [],
            uniqueSizes: [],
            color: {
                id: '',
                text: '',
                product_attr_id: '',
            },
            size: '',
        return {}
            quantity: 1,
        }
    },
    watch: {
        '$route'() {
            this.getProduct();
        }
    },
    mounted() {
        this.getProduct();
    },
    methods: {
        async getProduct() {
            try {
                this.slug = this.$route.params.slug;
                this.item_code = this.$route.params.item_code;

                if (this.slug == '' || this.item_code == '' || this.slug == undefined || this.slug == null) {
                    this.$router.push({ name: 'Index' });
                } else {
                    let data = await axios.get(getUrlList().product + '/' + this.item_code + '/' + this.slug);

                    console.log(data.data.data.data);

                    if (data.status == 200 && data.data.data.data != undefined) {
                        this.product = data.data.data.data;

                        for (var item in this.product.product_attributes) {
                            for (var subItem in this.product.product_attributes[item].images) {
                                this.images.push(this.product.product_attributes[item].images[subItem]);
                            }

                            this.colors.push({
                                id: this.product.product_attributes[item].colors.id,
                                value: this.product.product_attributes[item].colors.value,
                                product_attr_id: this.product.product_attributes[item].id,
                                size: this.product.product_attributes[item].sizes.text,
                            });

                            this.sizes.push({
                                id: this.product.product_attributes[item].sizes.id,
                                text: this.product.product_attributes[item].sizes.text,
                                product_attr_id: this.product.product_attributes[item].id,
                            });

                            this.uniqueSizes = [...new Set(this.sizes.map(item => item.text))];
                            this.uniqueColors = this.colors;

                            console.table(this.colors);
                            console.table(this.sizes);

                            console.table(this.uniqueSizes);
                            console.table(this.uniqueColors);
                        }
                    } else {
                        console.log('No data found');
                    }
                }
            } catch (error) {
                console.error(error);
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
        },
    },
}
</script>

<style></style>
