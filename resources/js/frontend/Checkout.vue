<template>
    <Layout>
        <template v-slot:content="slotProps">
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg"
                data-background="/front_assets/img/slider/third_slider_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2>Checkout Page</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- checkout-area -->
            <section class="checkout-area pt-95 pb-95">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="checkout-wrap">
                                <div class="checkout-top">
                                    <h5 class="title">Billing details</h5>
                                    <router-link :to="'/shopping_cart'" class="back">
                                        <i class="fas fa-angle-left"></i>
                                        Back to Cart
                                    </router-link>
                                </div>
                                <form action="#" class="checkout-form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-grp">
                                                <label for="fName">First Name <span>*</span></label>
                                                <input required type="text" id="fName" v-model="firstName">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-grp">
                                                <label for="lName">Last Name <span>*</span></label>
                                                <input required type="text" id="lName" v-model="lastName">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-grp">
                                                <label for="email">E-Mail Address <span>*</span></label>
                                                <input required type="email" id="email" v-model="email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-grp">
                                                <label>Country / Region <span>*</span></label>
                                                <input required type="text" id="country" v-model="country" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-grp">
                                                <label for="zip">Postal / ZIP Code <span>*</span></label>
                                                <input required type="number" id="zip" v-model.number="postalZipCode"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-grp">
                                                <label for="phone">Your Phone <span>*</span></label>
                                                <input required type="number" id="phone" v-model.number="phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-grp">
                                                <label>Town / City <span>*</span></label>
                                                <input disabled type="text" id="townCity" v-model="townCity">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-grp">
                                                <label>State / Division <span>*</span></label>
                                                <input disabled type="text" id="stateDivision" v-model="stateDivision">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-grp">
                                                <label for="address">Address <span>*</span></label>
                                                <input required type="text" id="address" v-model="address">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="different-address custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="stda">
                                                <label class="custom-control-label" for="stda">SHIP TO A DIFFERENT
                                                    ADDRESS?</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-grp mb-0">
                                                <label for="message">Order you have Notes
                                                    <small>(Optional)</small></label>
                                                <textarea name="message" id="message"
                                                    placeholder="About Your Special Delivery Notes" v-model="deliveryNotes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-8">
                            <aside class="checkout-sidebar">
                                <h6 class="title">Cart Totals</h6>
                                <div class="shop-cart-widget">
                                    <form action="#">
                                        <ul>
                                            <li class="sub-total"><span>SUBTOTAL</span> $ 136.00</li>
                                            <li>
                                                <span>SHIPPING</span>
                                                <div class="shop-check-wrap">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">FLAT
                                                            RATE: $15</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">FREE
                                                            SHIPPING</label>
                                                    </div>
                                                    <a href="#" class="calculate">Calculate shipping</a>
                                                </div>
                                            </li>
                                            <li class="cart-total-amount"><span>TOTAL</span> <span class="amount">$
                                                    151.00</span></li>
                                        </ul>
                                        <div class="payment-method-info">
                                            <div class="paypal-method-flex">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">Cash on
                                                        delivery</label>
                                                    <p>Pay with cash upon delivery.</p>
                                                </div>
                                            </div>
                                            <div class="paypal-method-flex">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck6">
                                                    <label class="custom-control-label" for="customCheck6">Payments on
                                                        Card</label>
                                                </div>
                                                <div class="paypal-logo">
                                                    <img src="/front_assets/img/images/card.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payment-terms">
                                            <p>The purpose Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et
                                                dolore
                                            </p>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                <label class="custom-control-label" for="customCheck7">I have read and
                                                    agree to the website terms and conditions</label>
                                            </div>
                                        </div>
                                        <button class="btn">Place order</button>
                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- checkout-area-end -->
        </template>
    </Layout>
</template>

<script>
import Layout from './Layout.vue';

export default {
    name: 'Checkout',
    components: {
        Layout,
    },
    data() {
        return {
            token: false,
            user_info: {
                'user_id': '',
                'auth': false
            },
            firstName: '',
            lastName: '',
            country: 'Bangladesh',
            address: '',
            townCity: '',
            stateDivision: '',
            postalZipCode: '',
            phone: '',
            email: '',
            deliveryNotes: '',
            paymentMethod: 'COD',
        }
    },
}
</script>
