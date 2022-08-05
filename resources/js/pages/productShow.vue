<template>
    
    <!-- Layout -->
    <layout>

        <!-- section product show -->
        <section id="product_show">
            <div class="container">
                <div v-if="product != undefined" class="row">

                    <!-- Image product -->
                    <div class="col-12 col-md-7 col-lg-6">
                        <figure class="image_wrapper mb-0">
                            <img :src="`/storage/${product.image}`" alt="">
                        </figure>
                    </div>

                    <!-- description -->
                    <div class="col-12 col-md-5 col-lg-6 description_wrapper">
                        <h2 class="fw-bolder">{{product.product_name}}</h2>
                        <p class="fw-bolder fs-5">{{product.price}} &euro;</p>
                        <p class="mb-5 fs-5">{{product.description}}</p>

                        <!-- btn quantity -->
                        <div class="btn_quantity mb-4">
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

                            <p class="mb-0 fw-bolder fs-5">Totale: <span class="fw-normal">{{priceXquantity(product)}} &euro;</span></p>
                        </div>

                        <!-- Btn add to cart -->
                        <div class="btn_add_to_cart mb-5 mb-md-0">
                            <button @click="addItemToCart(product)" :disabled="product.quantity == 0 ? true : false" class="btn btn-primary text-white">Aggiungi al carrello</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </layout>

</template>

<script>
import layout from '../layouts/layout.vue';

    export default {
        name: 'productShow',
        components: {
            layout,
        },

        data() {
            return {

                // array product
                product: undefined,

                // array cart shop
                cart_shop: undefined,
            }
        },

        methods: {
            // fetch product
            fetchProduct() {
                axios.get(`/api/product-show/${this.$route.params.id}`)
                .then( res => {

                    // product res data product
                    this.product = res.data.product[0];

                    // if not set item cart_shop localStorage
                    if(!localStorage.getItem("cart_shop")) {
                        localStorage.setItem("cart_shop", "[]");
                    } else if(!localStorage.getItem("total")) {
                        localStorage.setItem("total", 0);
                    }

                    // cart shop json localStorage cart_shop
                    this.cart_shop = JSON.parse(localStorage.getItem('cart_shop'));
                })
                .catch(err => {
                    console.warn(err);
                })
            },

            // price x quantity product
            priceXquantity(product) {
                // var price
                let price = Math.round((product.price * product.quantity) * 100) / 100;

                // return price
                return price;
            },

            // Add item to cart shop
            addItemToCart(product) {
                // if cart shop lenth 0
                if(this.cart_shop.length == 0) {

                    // cart_shop push product 
                    this.cart_shop.push(product);
                } else {
                    // cart shop product == product.id
                    let product_find = this.cart_shop.find(element => element.id == product.id);

                    // if product_find == undefined
                    if(product_find == undefined) {
                        this.cart_shop.push(product);
                    } else {
                        this.updateItemQuantity(product.id, product.quantity);
                    }
                }

                // local storage set item cart_shop array cart_shop
                localStorage.setItem("cart_shop", JSON.stringify(this.cart_shop));

                // localStorage set item total function getTotalCartShop
                localStorage.setItem("total", this.getTotalCartShop());
            },

            // update quantity product cart shop
            updateItemQuantity(product_id, quantity) {
                // foreach cart shop
                this.cart_shop.forEach(element => {
                    // if element == product id 
                    if(element.id == product_id) {
                        element.quantity = quantity;
                    }
                });
            },

            // getTotal cart shop
            getTotalCartShop() {
                // item price
                let item_price;

                // total cart shop
                let total_cart_shop = 0;

                // foreach this.cart_shop
                this.cart_shop.forEach(element => {
                    item_price = element.price * element.quantity;
                    total_cart_shop += item_price;
                });

                // return total cart shop
                return total_cart_shop;
            }
        },

        beforeMount() {
            // richiamo fetch product
            this.fetchProduct();
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

#product_show {
    padding-top: 65px !important;

    .image_wrapper {
        height: 500px;
        border-radius: 5px;
        border: 4px solid $gray-2;
        overflow: hidden;
        box-shadow: 0 .5rem 1rem rgba($white, .20);

        img {
            object-fit: cover;
            object-position: center;
        }
    }

    .description_wrapper {
        padding-left: 25px;
        padding-top: 25px;

        h2 {
            padding-bottom: 10px;
            border-bottom: 2px solid $gray-2;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        p {
            margin-bottom: 15px;
        }

        .btn_quantity {

            .list_btn {
                display: flex;
                align-items: center;
                gap: 25px;

                .price {
                    width: 55px;
                    text-align: center;
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

</style>