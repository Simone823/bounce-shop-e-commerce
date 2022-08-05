<template>
    
    <!-- Layout -->
    <layout>

        <!-- section cart shop -->
        <section id="cart_shop">
            <div class="container">
                <div class="row">
                    <!-- title -->
                    <div class="title text-center mb-5 col-12">
                        <h1 class="mb-0 text-uppercase fw-bold">Il mio carrello</h1>
                    </div>

                    <!-- Product wrapper -->
                    <div v-if="cart_shop.length" class="col-12 col-sm-6 product_wrapper">
                        <!-- product list -->
                        <ul class="product_list">
                            <li class="mb-5" v-for="(product, index) in cart_shop" :key="index">
                                <!-- product image -->
                                <figure class="img_wrapper">
                                    <img :src="`/storage/${product.image}`" alt="">
                                </figure>

                                <!-- description -->
                                <div class="description">
                                    <h5 class="mb-0 fw-bolder">{{product.product_name}}</h5>
                                    <p class="mb-0 fs-5">{{product.price}}</p>
                                </div>

                                <!-- quantity -->
                                <div class="quantity">
                                    <ul class="list_btn mb-4">
                                        <li>
                                            <button class="btn_remove" :disabled="product.quantity == 1 ? true : false" @click="product.quantity > 1 ? product.quantity-- : product.quantity = 1">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </li>
                                        <li class="price">
                                            <p class="mb-0 fs-5">{{product.quantity}}</p>
                                        </li>
                                        <li>
                                            <button class="btn_add" :disabled="product.quantity == 8 ? true : false" @click="product.quantity++">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                                <!-- total cart shop -->
                                <div class="total_cart">
                                    <h5>Totale: {{Math.round((product.price * product.quantity) * 100) / 100}} &euro;</h5>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Carrello vuoto -->
                    <div v-else class="col-12 text-center">
                        <h1>Il tuo carrello è vuoto</h1>
                        <a class="btn btn-primary text-white" href="/products">Vai alla pagina prodotti per acquistare</a>
                    </div>

                </div>
            </div>
        </section>

    </layout>

</template>

<script>
import layout from '../layouts/layout.vue';

    export default {
        name: 'cartShop',
        components: {
            layout,
        },

        data() {
            return {

                // array cart shop
                cart_shop: JSON.parse(localStorage.getItem("cart_shop")),

                // total cart shop
                total_cart_shop: localStorage.getItem("total"),
            }
        },
    }
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

#cart_shop {

    .product_wrapper {

        .product_list {

            li {
                display: flex;
                flex-wrap: wrap;
                gap: 18px;
                border-bottom: 2px solid $gray-2;
            }

            .img_wrapper {
                width: 120px;
                height: 120px;

                img {
                    width: 100%;
                    height: 100%;
                    display: block;
                    object-fit: cover;
                    object-position: center;
                }
            }

            .description {
                width: 190px;
            }

            .quantity {

                .list_btn {
                    display: flex;
                    align-items: center;
                    gap: 18px;
                    
                    li {
                        border-bottom: none;
                    }

                    .btn_remove,
                    .btn_add {
                        width: 42px;
                        height: 42px;
                        aspect-ratio: 1/1;
                        background-color: transparent;
                        color: $white;
                        border: 2px solid $blue-1;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        cursor: pointer;

                        &:disabled {
                            opacity: 0.65;
                            cursor: not-allowed;
                        }

                        &:hover:not(:disabled) {
                            border: 2px solid $white;
                            background-color: $blue-1;
                            transition: all 300ms linear;
                        }
                    }
                }
            }
        }

    }
}

</style>