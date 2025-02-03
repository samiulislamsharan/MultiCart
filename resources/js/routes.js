import { createRouter, createWebHistory } from 'vue-router';
import Index from './frontend/Index.vue';
import Category from './frontend/Category.vue';

const routes = [
    {
        name: 'index',
        path: '/',
        component: Index
    },
    {
        name: 'Category',
        path: '/category/:slug?',
        component: Category
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
