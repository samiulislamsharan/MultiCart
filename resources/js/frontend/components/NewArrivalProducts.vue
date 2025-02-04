<template>
    <!-- new-arrival-area -->
    <section class="new-arrival-area pt-95 pb-45">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title title-style-two text-center mb-45">
                        <h3 class="title">New Arrival Collection</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="new-arrival-nav mb-35">
                        <button>Best Sellers</button>
                        <button v-for="(item, index) in homeCategories" :key="item.id"
                            :class="showActiveClass(1, index)" :data-filter="'.category-' + item.id">
                            {{ item.name }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="row new-arrival-active">
                <div v-for="item in homeProducts" :key="item.id"
                    :class="'col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer ' + 'category-' + item.category_id">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <!-- <div class="discount-tag">-20%</div> -->
                            <div class="discount-tag new">New</div>
                            <a href="shop-details.html"><img :src="item.image" :alt="item.name + '_image'"
                                    style="height: 15rem; object-fit: cover;"></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">{{ item.name }}</a></h5>
                            <span class="price">{{ 'BDT ' + item.product_attributes[0].price }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- new-arrival-area-end -->
</template>

<script>
export default {
    props: {
        homeProducts: {
            type: Array,
            required: true
        },
        homeCategories: {
            type: Array,
            required: true
        }
    },
    methods:{
        showActiveClass(type, index) {
            if (type == 1 && index == 0) {
                return 'active';
            } else if (type == 2 && index == 0) {
                return 'show active';
            } else {
                return '';
            }
        }
    }
}
</script>
