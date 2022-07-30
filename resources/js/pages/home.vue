<template>

    <!-- layout -->
    <layout>

        <!-- Home -->
        <section id="home">
            
            <div class="container">

                <!-- Row categories -->
                <div class="row">

                    <!-- Category wrapper col -->
                    <div class="col-12">

                        <!-- title -->
                        <div class="title mb-4 text-center">
                            <h1 class="mb-0">Top Categorie</h1>
                        </div>
                        
                        <!-- list category -->
                        <ul class="category_list d-flex flex-wrap justify-content-center gap-4">
                            <router-link tag="li" to="" class="btn btn-primary text-white px-5" v-for="category in categories" :key="category.id">
                                {{category.category_name}}
                            </router-link>
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
            this.fetchCategories();
        }
    }
</script>

<style lang="scss" scoped>

</style>