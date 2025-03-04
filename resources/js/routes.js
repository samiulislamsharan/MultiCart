import { createRouter, createWebHistory } from 'vue-router';
import Index from './frontend/Index.vue';
import Category from './frontend/Category.vue';
import Product from './frontend/Product.vue';
import ShoppingCart from './frontend/ShoppingCart.vue';
import Checkout from './frontend/Checkout.vue';

const routes = [
    {
        name: 'Index',
        path: '/',
        component: Index
    },
    {
        name: 'Category',
        path: '/category/:slug?',
        component: Category
    },
    {
        name: 'Product',
        path: '/product/:item_code?/:slug?',
        component: Product
    },
    {
        name: 'ShoppingCart',
        path: '/shopping_cart',
        component: ShoppingCart
    },
    {
        name: 'Checkout',
        path: '/checkout',
        component: Checkout
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
