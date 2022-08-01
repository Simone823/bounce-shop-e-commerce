<template>

    <!-- layout -->
    <layout>

        <!-- Home -->
        <section id="home">

            <div class="container-fluid">
                <!-- Row jumbotron -->
                <div class="row jumbotron">
                    <figure class="image_wrapper">
                        <img :src="require('/public/img/jumbo_image.jpg')" alt="">
                    </figure>

                    <div class="description text-center">
                        <h1 class="fs-1 fw-bold">
                            Bounce Shop <br>
                            Accessori e abbigliamento sportivo  
                        </h1>
                    </div>
                </div>
            </div>

            <div class="container">


                <!-- Row categories wrapper -->
                <div class="row categories_wrapper">
                    <!-- title -->
                    <div class="title mb-5 text-center">
                        <h2 class="mb-0 text-uppercase">Categorie più selezionate</h2>
                    </div>
                    
                    <!-- list category -->
                    <ul class="category_list d-flex flex-wrap justify-content-center">
                        <router-link tag="li" :to="{ name: 'products-category', params: {slug: category.slug, id: category.id} }" class="btn btn-primary text-white px-5" v-for="category in categories" :key="category.id">
                            {{category.category_name}}
                        </router-link>
                    </ul>
                </div>

                <!-- Row products -->
                <div class="row products_wrapper">
                    <!-- title -->
                    <div class="title mb-5 text-center">
                        <h2 class="mb-0 text-uppercase">Ultimi prodotti aggiunti</h2>
                    </div>

                    <!-- Product_list -->
                    <ul class="product_list d-flex flex-wrap">
                        <li v-for="product in products" :key="product.id" class="col-12 col-sm-6 col-lg-4">
                            <div class="card bg-dark text-white">
                                <figure class="img_wrapper">
                                    <img :src="`storage/${product.image}`" alt="">
                                </figure>

                                <div class="card-body">
                                    <h5 class="card-title fw-bolder">{{product.product_name}}</h5>
                                    <p class="card-text">{{product.description}}</p>
                                    <p class="card-text fs-5">{{product.price}}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Row services -->
                <div class="row services_wrapper">
                    <!-- service list -->
                    <ul class="service_list d-flex flex-wrap justify-content-center">
                        <li class="col-12 col-sm-6 col-md-4 col-lg-4" v-for="(service, index) in services" :key="index">
                            <figure class="icon">
                                <img :src="service.icon" alt="">
                            </figure>
                            
                            <div class="description text-center">
                                <h3 class="text-uppercase">{{service.title}}</h3>
                                <p>{{service.text}}</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </section>

    </layout>

</template>

<script>
    // import Layout
    import layout from '../layouts/layout.vue';

    export default {
        name: 'home',

        components: {
            layout,
        },

        data() {
            return {

                // array categories
                categories: [],

                // array products
                products: [],

                // array services
                services: [
                    {
                        icon: require('/public/img/delivery_truck_icon.svg'),
                        title: 'Consegna gratuita',
                        text: 'Ordinate ora e avrete la consegna assolutamente gratuita.'
                    },

                    {
                        icon: require('/public/img/exchange_icon.svg'),
                        title: '30 Giorni di restituzione',
                        text: 'È sufficiente restituirlo entro 30 giorni per ottenere un cambio'
                    },

                    {
                        icon: require('/public/img/secure_icon.svg'),
                        title: '100% Pagamento sicuro',
                        text: 'Garantiamo un pagamento sicuro.'
                    }
                ]
            }
        },

        methods: {
            // Fetch categories
            fetchCategories() {
                axios.get('/api/categories')
                .then( res => {
                    
                    // array categories res data categories
                    this.categories = res.data.categories;
                })
                .catch( err => {
                    console.warn(err);
                })
            },

            // fetch products
            fetchProducts() {
                axios.get('/api/products')
                .then( res => {

                    // array products res data products
                    this.products = res.data.products;
                    console.log(this.products);
                })
                .catch( err => {
                    console.warn(err);
                })
            }
        },

        beforeMount() {
            // Richiamo funzione fetch categories
            this.fetchCategories();

            // Richiamo funzione fetch products
            this.fetchProducts();
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

#home {
    padding-top: 0 !important;

    .jumbotron {
        position: relative;

        .image_wrapper {
            padding: 0;
            margin: 0;
            height: 550px;
            position: relative;

            &::after {
                content: '';
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: black;
                opacity: 0.55;
            }

            img {
                object-fit: cover;
                object-position: center;
                filter: saturate(40%);
            }
        }

        .description {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);

            h1 {
                text-shadow: 0 0 10px black;
                text-transform: uppercase;
            }
        }
    }

    .categories_wrapper {
        padding: 40px 0;
        border-bottom: 2px solid $gray-2;

        .category_list {
            column-gap: 50px;
            row-gap: 30px;
        }
    }

    .products_wrapper {
        padding: 40px 0;
        border-bottom: 2px solid $gray-2;

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
    }

    .services_wrapper {
        padding-top: 40px;

        .service_list {
            row-gap: 30px;

            li {
                display: flex;
                flex-direction: column;
                row-gap: 20px;
                align-items: center;
                padding: 0 25px;

                .icon {
                    width: 100px;
                    height: 100px;
                    margin: 0;
                }
            }
        }
    }
}


</style>