<template>
    
    <!-- layout -->
    <layout>

        <!-- section products category -->
        <section id="products_category">
            <div class="container">

                <!-- Row products -->
                <div class="row products_wrapper">
                    <!-- title -->
                    <div class="title text-center mb-5">
                        <h3 class="text-white">{{categorySelected}}</h3>
                    </div>

                    <!-- Product_list -->
                    <ul class="product_list d-flex flex-wrap justify-content-center mb-5">
                        <li v-for="(product, index) in products" :key="index" class="col-12 col-sm-6 col-lg-4">
                            <div class="card bg-dark text-white">
                                <figure class="img_wrapper">
                                    <img :src="`/storage/${product.image}`" alt="">
                                </figure>

                                <div class="card-body">
                                    <h5 class="card-title fw-bolder">{{product.product_name}}</h5>
                                    <p class="card-text">{{product.description}}</p>
                                    <p class="card-text fs-5">{{product.price}} &euro;</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- Pages -->
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item" @click="fetchProductsCategory(number)" :class="currentPage == number ? 'active' : ''" v-for="number in lastPage" :key="number">
                            <p class="page-link">{{number}}</p>
                        </li>
                    </ul>
                </div>

            </div>
        </section>

    </layout>

</template>

<script>
import layout from '../layouts/layout.vue';

    export default {
        name: 'productsCategory',

        components: {
            layout,
        },

        data() {
            return {

                // name category selected
                categorySelected: '',

                // array products
                products: [],

                // current page
                currentPage: 1,

                // last page
                lastPage: 0,
            }
        },

        methods: {
            // Fetch products category
            fetchProductsCategory(page = 1) {
                axios.get(`/api/products-category/${this.$route.params.id}`, {
                    params: {
                        page: page,
                    }
                })
                .then( res => {

                    // destrutturazione res
                    const {products} = res.data;
                    const {data, current_page, last_page} = products;

                    // current page
                    this.currentPage = current_page;

                    // lastpage
                    this.lastPage = last_page;

                    // recupero i prodotti
                    this.products = data;

                    // recupero il nome della categoria tramite prodotto indice 0
                    this.categorySelected = this.products[0].category_name;
                })
                .catch( err => {
                    console.warn(err);
                })
            }
        },

        beforeMount() {
            // Richiamo funzione fetch products category
            this.fetchProductsCategory();
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

.products_wrapper {
    padding: 40px 0;
    border-bottom: 2px solid $gray-2;

    .title {

        h3 {
            max-width: max-content;
            margin: 0 auto;
            background-color: $blue-1;
            padding: 8px 45px;
            border-radius: 5px;
        }
    }

    .product_list {
        row-gap: 45px;

        li {
            padding: 0 25px;

            .card {
                height: 100%;
                overflow: hidden;
                border: none;
                border-radius: 8px;
                box-shadow:  0 1rem 3rem rgba($white, .175) inset;

                &:hover {
                    transform: scale(1.03);
                    transition: all 300ms linear;

                    img {
                        transform: scale(1.08);
                        transition: all 300ms linear;
                    }
                }

                .img_wrapper {
                    width: 100%;
                    height: 350px;
                    overflow: hidden;
                    box-shadow: 0 .5rem 1rem rgba($white, .15);

                    img {
                        object-fit: cover;
                        object-position: center;
                    }
                }

            }
        }
    }

    .pagination {
        .page-link {
            margin: 0;
            cursor: pointer;
        }
    }
}

</style>