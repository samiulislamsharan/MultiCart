import { createRouter, createWebHistory } from 'vue-router';
import Index from './frontend/Index.vue';
import Category from './frontend/Category.vue';
import Product from './frontend/Product.vue';

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
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
