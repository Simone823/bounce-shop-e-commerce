<template>
    <!-- Layout -->
    <layout>
        <!-- section cart shop -->
        <section id="cart_shop">
            <div class="container">

                <!-- row 1 -->
                <div class="row" v-if="cart_shop != null && cart_shop.length">
                    <!-- title -->
                    <div class="title text-center mb-5 col-12">
                        <h1 class="mb-0 text-uppercase fw-bold">
                            Il mio carrello
                        </h1>
                    </div>

                    <!-- Product wrapper -->
                    <div class="col-12 col-sm-6 product_wrapper mb-5 mb-sm-0">
                        <!-- product list -->
                        <ul class="product_list">
                            <li class="mb-5" v-for="(product, index) in cart_shop" :key="index">
                                <!-- product image -->
                                <figure class="img_wrapper">
                                    <img :src="`/storage/${product.image}`" alt=""/>
                                </figure>

                                <!-- description -->
                                <div class="description">
                                    <h5 class="mb-0 fw-bolder">
                                        {{ product.product_name }}
                                    </h5>
                                    <p class="mb-0 fs-5">
                                        {{ product.price }} &euro;
                                    </p>
                                </div>

                                <!-- quantity -->
                                <div class="quantity">
                                    <ul class="list_btn mb-4">
                                        <li>
                                            <button class="btn_remove" :disabled="product.quantity == 1 ? true : false" @click="product.quantity > 1 ? product.quantity-- : (product.quantity = 1), updateItemQuantity(product.id, product.quantity)">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </li>
                                        <li class="price">
                                            <p class="mb-0 fs-5">
                                                {{ product.quantity }}
                                            </p>
                                        </li>
                                        <li>
                                            <button class="btn_add" :disabled="product.quantity == 8 ? true : false" @click="product.quantity++, updateItemQuantity(product.id, product.quantity)">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                                <!-- total cart shop -->
                                <div class="total_cart">
                                    <h5 class="mb-4">
                                        Totale: {{Math.round(product.price * product.quantity * 100) / 100}} &euro;
                                    </h5>
                                    <button @click="removeItemFromCartShop(product.id)" class="btn btn-primary text-white">
                                        Elimina
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- total cart shop -->
                    <div class="col-12 col-sm-6 total_cart_shop">
                        <div class="card py-3">
                            <h2 class="mb-0 text-center">Sommario ordine</h2>

                            <div class="card-body pb-0">
                                <ul class="detail_total mb-4">
                                    <li class="d-flex justify-content-between mb-2 flex-wrap">
                                        <p class="fs-5 mb-0">Sconto</p>
                                        <p class="fs-5 mb-0">0 &euro;</p>
                                    </li>
                                    <li class="d-flex justify-content-between mb-2">
                                        <p class="fs-5 mb-0">IVA</p>
                                        <p class="fs-5 mb-0">22%</p>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <p class="fs-5 mb-0 fw-bolder">
                                            Totale
                                        </p>
                                        <p class="fs-5 mb-0 fw-bolder">
                                            {{ getTotalCartShop() }} &euro;
                                        </p>
                                    </li>
                                </ul>

                                <!-- user detail -->
                                <div class="user_detail mb-4" v-if="auth_user_id != 'null'">
                                    <h2 class="mb-3 text-center">
                                        Dettagli Spedizione
                                    </h2>

                                    <ValidationObserver ref="form">
                                        <form ref="formgroup" @submit.prevent="sendOrder()" method="post">
                                            <!-- Name -->
                                            <validationProvider
                                                tag="div" class="col-12 validation_provider mb-4" name="user_name" rules="required|min:3|max:100|alpha_spaces" v-slot="{ errors }">
                                                <div class="form-floating">
                                                    <input disabled v-model="form.user_name" type="text" name="user_name" class="form-control text-black bg-dark text-white border-0" id="user_name" placeholder="Nome"/>
                                                    <label for="user_name">
                                                        <i class="fa-solid fa-user"></i>
                                                        Nome
                                                    </label>

                                                    <div class="error mt-2 text-primary">
                                                        {{ errors.length ? errors[0] : ""}}
                                                    </div>
                                                </div>
                                            </validationProvider>

                                            <!-- Surname -->
                                            <validationProvider tag="div" class="col-12 validation_provider mb-4" name="user_surname" rules="required|min:3|max:100|alpha_spaces" v-slot="{ errors }">
                                                <div class="form-floating">
                                                    <input disabled v-model="form.user_surname" type="text" name="user_surname" class="form-control text-black bg-dark text-white border-0" id="user_surname" placeholder="Cognome"/>
                                                    <label for="user_surname">
                                                        <i class="fa-solid fa-user"></i>
                                                        Cognome
                                                    </label>

                                                    <div class="error mt-2 text-primary">
                                                        {{ errors.length ? errors[0] : "" }}
                                                    </div>
                                                </div>
                                            </validationProvider>

                                            <!-- city -->
                                            <validationProvider tag="div" class="col-12 validation_provider mb-4" name="user_city" rules="required|min:3|max:100|alpha_spaces" v-slot="{ errors }">
                                                <div class="form-floating">
                                                    <input v-model="form.user_city" type="text" name="user_city" class="form-control text-black bg-dark text-white border-0" id="user_city" placeholder="Città"/>
                                                    <label for="user_city">
                                                        <i class="fa-solid fa-city"></i>
                                                        Città
                                                    </label>

                                                    <div class="error mt-2 text-primary" >
                                                        {{ errors.length ? errors[0] : "" }}
                                                    </div>
                                                </div>
                                            </validationProvider>

                                            <!-- address -->
                                            <validationProvider tag="div" class="col-12 validation_provider mb-4" name="user_address" rules="required|min:3|max:255" v-slot="{ errors }">
                                                <div class="form-floating">
                                                    <input v-model="form.user_address" type="text" name="user_address" class="form-control text-black bg-dark text-white border-0" id="user_address" placeholder="Indirizzo"/>
                                                    <label for="user_address">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        Indirizzo
                                                    </label>

                                                    <div class="error mt-2 text-primary">
                                                        {{ errors.length ? errors[0] : ""}}
                                                    </div>
                                                </div>
                                            </validationProvider>

                                            <!-- button link pay page -->
                                            <div class="btn-pay">
                                                <button type="submit" class="btn btn-primary text-white w-100">
                                                    Vai al pagamento
                                                </button>
                                            </div>
                                        </form>
                                    </ValidationObserver>
                                </div>

                                <!-- btn sign in  -->
                                <div v-else class="register_btn">
                                    <a href="/login" class="btn btn-primary text-white w-100">Accedi o Registrati per effettuare un'ordine</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- row 2 -->
                <div v-else class="row align-items-center justify-content-center h-100 pt-5">
                    <div class="col-12 col-md-8">
                        <div class="cart_empty bg-dark shadow-inset-1 text-center">
                            <figure>
                                <img :src="require('/public/img/cart_shop_icon.svg')" alt="">
                            </figure>
                            <h1>Il tuo carrello è vuoto</h1>
                            <a class="btn btn-primary text-white" href="/products">Vai alla pagina prodotti per acquistare</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </layout>
</template>

<script>
import layout from "../layouts/layout.vue";

export default {
    name: "cartShop",
    components: {
        layout,
    },

    data() {
        return {
            // array cart shop
            cart_shop: JSON.parse(localStorage.getItem("cart_shop")),

            // Auth user id meta name user id guest blade php
            auth_user_id: document
                .querySelector("meta[name='user-id']")
                .getAttribute("content"),

            // auth user name
            auth_user_name: document
                .querySelector("meta[name='user-name']")
                .getAttribute("content"),

            // auth user surname
            auth_user_surname: document
                .querySelector("meta[name='user-surname']")
                .getAttribute("content"),

            // auth user city
            auth_user_city: document
                .querySelector("meta[name='user-city']")
                .getAttribute("content"),

            // auth user city
            auth_user_address: document
                .querySelector("meta[name='user-address']")
                .getAttribute("content"),

            // form input user detail
            form: {
                user_name: "",
                user_surname: "",
                user_city: "",
                user_address: "",
            },
        };
    },

    beforeMount() {
        // form user name
        this.form.user_name = this.auth_user_name;

        // form user surname
        this.form.user_surname = this.auth_user_surname;

        // form user city
        this.form.user_city = this.auth_user_city;

        // form user address
        this.form.user_address = this.auth_user_address;
    },

    methods: {
        // getTotal cart shop
        getTotalCartShop() {
            // item price
            let item_price;

            // total cart shop
            let total_cart_shop = 0;

            // foreach this.cart_shop
            this.cart_shop.forEach((element) => {
                item_price = Math.round(element.price * element.quantity * 100) / 100;
                total_cart_shop += item_price;
                
                // fixed total_cart_shop 2 cifre dopo la virgola
                total_cart_shop.toFixed(2);
            });

            // return total cart shop
            return total_cart_shop;
        },

        // update quantity product cart shop
        updateItemQuantity(product_id, quantity) {
            // foreach cart shop
            this.cart_shop.forEach((element) => {
                // if element == product id
                if (element.id == product_id) {
                    element.quantity = quantity;
                }
            });

            // localStorage set item cart shop
            localStorage.setItem("cart_shop", JSON.stringify(this.cart_shop));

            // localStorage set item total cart shop
            localStorage.setItem("total", this.getTotalCartShop());
        },

        // remove item from cart shop
        removeItemFromCartShop(product_id) {
            // filter cart shop
            this.cart_shop = this.cart_shop.filter(
                (product) => product.id != product_id
            );

            // localStorage set item cart_shop
            localStorage.setItem("cart_shop", JSON.stringify(this.cart_shop));

            // localStorage set item total
            localStorage.setItem("total", this.getTotalCartShop());
        },

        // Send order if auth user != 'null'
        sendOrder() {
            // if auth user == null
            if (this.auth_user_id == "null") {
                // redirect url /login
                window.location = "/login";
            } else {
                // then success validation form
                this.$refs.form.validate().then((success) => {
                    // if success
                    if (success) {
                        // axios post order create api
                        axios.post("/api/order-create", {
                            cart_shop: this.cart_shop,
                            total: localStorage.getItem("total"),
                            user_id: this.auth_user_id,
                            user_name: this.form.user_name,
                            user_surname: this.form.user_surname,
                            user_city: this.form.user_city,
                            user_address: this.form.user_address,
                        })
                        .then((res) => {
                            // console.log(res);
                            // redirect to url /credit card
                            window.location = "/credit-card";

                            // localStorage set item cart shop []
                            localStorage.setItem("cart_shop", "[]");

                            // localStorage set item total 0
                            localStorage.setItem("total", 0);

                            // array cart shop
                            this.cart_shop = [];
                        })
                        .catch((err) => {
                            console.warn(err);
                        });
                    }
                });
            }
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

#cart_shop {
    .product_wrapper {
        .product_list {
            max-height: 565px;
            overflow-y: auto;

            &::-webkit-scrollbar {
                width: 2px;
            }

            &::-webkit-scrollbar-thumb {
                width: 2px;
            }

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

    .total_cart_shop {
        .card {
            background-color: $gray-2;
            border: none;
            border-radius: 8px;
            box-shadow: 0 1rem 3rem rgba($white, 0.175) inset;

            .user_detail {
                input {
                    box-shadow: 0 1rem 3rem rgba(white, 0.175) inset;

                    &:disabled {
                        opacity: 0.68;
                    }
                }
            }
        }
    }

    .cart_empty {
        border-radius: 5px;
        padding: 20px 0;

        figure {
            width: 130px;
            height: 130px;
            margin: 0 auto;
            margin-bottom: 25px;
        }
    }
}
</style>