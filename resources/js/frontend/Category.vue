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
import { useRoute } from 'vue-router';

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
    watch: {
        '$route'() {
            this.getProducts();
        }
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        async getProducts() {
            try {
                const route = useRoute();
                this.slug = this.$route.params.slug;

                let data = await axios.get(getUrlList().category + '/' + this.slug);

                if (this.slug == '' || this.slug == undefined || this.slug == null) {
                    this.$router.push({ name: 'Index' });
                } else {
                    if (data.status == 200 && data.data.data.data.categories.length > 0) {
                        this.categories = data.data.data.data.categories;
                        this.products = data.data.data.data.products.data;
                        this.brands = data.data.data.data.brands;
                        this.colors = data.data.data.data.colors;
                        this.sizes = data.data.data.data.sizes;
                        this.categoriesProductCount = data.data.data.data.categories_product_count;
                    } else {
                        console.log('No data found');
                    }
                }
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
