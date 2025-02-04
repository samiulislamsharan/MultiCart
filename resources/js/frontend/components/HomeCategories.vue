<template>
    <!-- category-area -->
    <div class="shoes-category-area pt-80 pb-30">
        <div class="container custom-container-two">
            <div class="row justify-content-center">
                <div v-for="item in homeCategories.slice(0, 3)" :key="item.id" class="col-lg-4 col-md-6 col-sm-9">
                    <div class="shoes-cat-item mb-50">
                        <div class="thumb mb-30">
                            <a href="shop-sidebar.html">
                                <img :src="item.image" alt="" style="height: 15rem;">
                            </a>
                        </div>
                        <div class="content">
                            <ul>
                                <li><a href="shop-sidebar.html">{{ item.name }}</a></li>
                                <li><span>18</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- category-area-end -->
</template>

<script>
export default {
    props:{
        homeCategories: {
            type: Array,
            required: true
        }
    }
}
</script>
