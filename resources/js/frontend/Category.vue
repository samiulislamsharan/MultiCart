<template>
    <Layout>
        <template v-slot:content>
            <h1>Selected Category Page</h1>
        </template>
    </Layout>
</template>
<script>
import Layout from './Layout.vue';
import axios from 'axios';
import getUrlList from '../provider.js';

export default {
    name: 'Category',
    components: {
        Layout
    },
    data() {
        return {
            categories: [],
            products: [],
            brands: [],
            colors: [],
            sizes: [],
            slug: '',
            category: '',
            lowPrice: '',
            highPrice: '',
            categoriesProductCount: [],
        }
    },
    }
}
</script>
