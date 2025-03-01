<template>
    <!-- cart -->
    <div class="header-action d-none d-md-block">
        <ul>
            <li class="header-search">
                <a href="#" data-toggle="modal" data-target="#search-modal">
                    <i class="flaticon-search"></i>
                </a>
            </li>
            <li class="header-shop-cart">
                <router-link :to="'/shopping_cart'">
                    <i class="flaticon-shopping-bag"></i>
                    <span>{{ cartCount }}</span>
                </router-link>
                <ul class="minicart">
                    <li v-if="cartCount > 0" v-for="item in cartProducts" :key="item.id"
                        class="d-flex align-items-start">
                        <div class="cart-img">
                            <a href="#">
                                <img :src="item.products[0].image" :alt="item.products[0].slug + '_image'"
                                    style="height: 5rem; object-fit: cover;">
                            </a>
                        </div>
                        <div class="cart-content">
                            <h4><a href="#">{{ item.products[0].name }}</a></h4>
                            <div class="cart-price">
                                <span class="new">
                                    {{ '&#2547; ' + formatPrice(item.products[0].product_attributes[0].price) }}
                                </span>
                                <span>
                                    <del>
                                        {{ '&#2547; ' + formatPrice(item.products[0].product_attributes[0].mrp) }}
                                    </del>
                                </span>
                            </div>
                        </div>
                        <div class="del-icon">
                            <a @click="removeFromCart(item.products[0].id, item.products[0].product_attributes[0].id, 1)"
                                href="javascript:void(0)"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </li>
                    <li v-else>
                        <p class="text-center mt-4"> <span class="font-weight-bold">Woops!</span> Nothing Here.</p>
                    </li>
                    <li>
                        <div class="total-price">
                            <span class="f-left">Total:</span>
                            <span class="f-right">
                                {{ '&#2547; ' + formatPrice(cartTotal) }}
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="checkout-link">
                            <router-link :to="'/shopping_cart'">Shopping Cart</router-link>
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
</template>

<script>
export default {
    name: 'HeaderCart',
    props: {
        cartProducts: {
            type: Array,
            required: true
        },
        cartCount: {
            type: Number,
            required: true
        },
        cartTotal: {
            type: Number,
            required: true
        },
        formatPrice: {
            type: Function,
            required: true
        },
        removeFromCart: {
            type: Function,
            required: true
        },
    },
}
</script>
