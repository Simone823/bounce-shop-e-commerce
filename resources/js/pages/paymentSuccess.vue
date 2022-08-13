<template>
    
    <!-- layout -->
    <layout>

        <!-- section payment success -->
        <section id="payment-success">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-mb-4">
                        <!-- wrapper -->
                        <div class="wrapper bg-dark p-5 text-center">
                            <figure class="icon">
                                <img :src="require('/public/img/success_icon.svg')" alt="">
                            </figure>
                            <h2 class="text-uppercase mb-3">Pagamento effettuato con successo!</h2>
                            <p class="mb-4 fs-5">
                                Grazie per aver acquistato i nostri prodotti<br>
                                Il tuo ordine verrà spedito entro 24h, <br>
                                Per informazioni o assistenza su ordini vai alla pagina 
                                <router-link tag="a" :to="{ name: 'contact' }" class="link-primary text-decoration-none">
                                    Contatti.
                                </router-link>
                            </p>
                            <router-link tag="a" :to="{ name: 'home'}" class="btn btn-primary text-white">
                                Torna alla Homepage
                            </router-link>
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
        name: 'paymentSuccess',
        components: {
            layout,
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

#payment-success {

    .wrapper {
       border: none;
        border-radius: 8px;
        box-shadow:  0 1rem 3rem rgba($white, .175) inset;

        .icon {
            max-width: 250px;
            height: 250px;
            margin: 0 auto;
            margin-bottom: 35px;

            img {
                width: 100%;
                height: 100%;
                display: block;
            }
        }
    }
    
}

</style>