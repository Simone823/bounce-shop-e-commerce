<template>
    
    <!-- layout -->
    <layout>

        <!-- section products -->
        <section id="products">
            <div class="container">

                <!-- row products wrapper -->
                <div class="row products_wrapper h-100">
                    <!-- title -->
                    <div class="title text-center mb-5">
                        <h1 class="text-white text-uppercase mb-0 fw-bold">Prodotti</h1>
                    </div>

                    <!-- Product_list -->
                    <ul class="product_list d-flex flex-wrap justify-content-center">
                        <li v-for="(product, index) in products" :key="index" class="col-12 col-sm-6 col-lg-4">
                            <div class="card bg-dark text-white">
                                <figure class="img_wrapper">
                                    <img :src="`/storage/${product.image}`" alt="">
                                </figure>

                                <div class="card-body">
                                    <h5 class="card-title fw-bolder">{{product.product_name}}</h5>
                                    <p class="card-text fs-5">{{product.price}} &euro;</p>
                                </div>

                                <div class="btn-detaiil text-center mb-4">
                                    <router-link tag="a" class="btn btn-primary text-white" :to="{ name: 'product-show', params: {id: product.id} }">
                                        Dettagli
                                    </router-link>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Row pages link -->
                <div class="row pages">
                    <!-- Pages -->
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item" @click="fetchProducts(number), AppScrollTop()" :class="currentPage == number ? 'active' : ''" v-for="number in lastPage" :key="number">
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
        name: 'products',
        components: {
            layout,
        },

        data() {
            return {

                // array products
                products: [],

                // current page
                currentPage: 1,

                // last page
                lastPage: 0,
            }
        },

        methods: {
            // fetch products
            fetchProducts(page = 1) {
               axios.get(`/api/products`, {
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
                })
                .catch( err => {
                    console.warn(err);
                })
            },

            // ScrollTop app
            AppScrollTop() {
                // recupero div app
                const divApp = document.getElementById('app');

                // div app scroll top
                divApp.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },

        beforeMount() {
            // richiamo funzione fetch products
            this.fetchProducts();
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

#products {

    .products_wrapper {
        padding-bottom: 40px;
        border-bottom: 2px solid $gray-2;

        .product_list {
            row-gap: 45px;
            min-height: 100%;

            li {
                padding: 0 25px;

                .card {
                    height: 100%;
                    overflow: hidden;
                    border: none;
                    border-radius: 8px;
                    box-shadow:  0 1rem 3rem rgba($white, .175) inset;

                    &:hover {
                        transform: translateY(-10px);
                        transition: all 300ms linear;
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
    }

    .pages {
        padding-top: 40px;

        .pagination {
            .page-link {
                margin: 0;
                cursor: pointer;
            }
        }
    }

}

</style>