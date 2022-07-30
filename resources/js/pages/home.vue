<template>

    <!-- layout -->
    <layout>

        <!-- Home -->
        <section id="home">
            <div class="container">

                <!-- Row categories wrapper -->
                <div class="row categories_wrapper">
                    <div class="col-12">
                        <!-- title -->
                        <div class="title mb-5 text-center">
                            <h2 class="mb-0 text-uppercase">Categorie più selezionate</h2>
                        </div>
                        
                        <!-- list category -->
                        <ul class="category_list d-flex flex-wrap justify-content-center">
                            <router-link tag="li" to="" class="btn btn-primary text-white px-5" v-for="category in categories" :key="category.id">
                                {{category.category_name}}
                            </router-link>
                        </ul>
                    </div>
                </div>

                <!-- Row services -->
                <div class="row services_wrapper">
                    <div class="col-12">
                        <!-- service list -->
                        <ul class="service_list d-flex flex-wrap">
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
            }
        },

        beforeMount() {
            // Richiamo funzione fetch categories
            this.fetchCategories();
        }
    }
</script>

<style lang="scss" scoped>

.categories_wrapper {
    margin-bottom: 80px;

    .category_list {
        column-gap: 50px;
        row-gap: 30px;
    }
}

.services_wrapper {

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

</style>