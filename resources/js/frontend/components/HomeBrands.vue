<template>
    <!-- brand-area -->
    <div class="instagram-post-area">
        <div class="container-fluid p-0 fix">
            <div class="row no-gutters insta-active">
                <div v-for="item in homeBrands" :key="item.id" class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img :src="item.image" :alt="item.text + '_image'"
                                style="height: 20rem ; object-fit: contain;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->
</template>

<script>
export default {
    props: {
        homeBrands: {
            type: Array,
            required: true
        }
    }
}
</script>
