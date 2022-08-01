<template>

   <!-- layout -->
    <layout>

        <!-- section contact -->
        <section id="contact">
            <div class="container">

                <!-- row title -->
                <div class="row title text-center mb-5">
                    <h1 class="mb-0 text-uppercase fw-bold">Contatti</h1>
                </div>

                <!-- row references -->
                <div class="row references_wrapper mb-5">
                    <h2 class="text-uppercase fw-bold">Bounce shop - E-commerce shop</h2>
                    <p class="fw-bolder fs-5">Indirizzo: <span class="fw-normal">Via Esempio 1, italia</span></p>
                    <p class="fw-bolder fs-5 mb-0">Telefono: <span class="fw-normal">000 000 0000</span></p>
                </div>

                <!-- form -->
                <ValidationObserver ref="form">
                    <form ref="formgroup" @submit.prevent="sendMessage()">
                        <!-- row inputs -->
                        <div class="row inputs_wrapper">

                            <!-- Name -->
                            <validationProvider tag="div" class="col-12 col-sm-6 validation_provider mb-4" name="guest_name" rules="required|min:3|max:200|alpha_spaces" v-slot="{errors}">
                                <div class="form-floating">
                                    <input v-model="form.guest_name" type="text" name="guest_name" class="form-control text-black bg-dark text-white border-0" id="guest_name" placeholder="Nome">
                                    <label for="guest_name">Nome</label>

                                    <div class="error mt-2 text-primary">
                                        {{ errors.length ? errors[0] : ''}}
                                    </div>
                                </div>
                            </validationProvider>

                            <!-- Email -->
                            <validationProvider tag="div" class="col-12 col-sm-6 validation_provider mb-4" name="guest_email" rules="required|email|min:3" v-slot="{errors}">
                                <div class="form-floating">
                                    <input v-model="form.guest_email" type="email" name="guest_email" class="form-control text-black bg-dark text-white border-0" id="guest_email" placeholder="Email">
                                    <label for="guest_email">E-mail</label>

                                    <div class="error mt-2 text-primary">
                                        {{ errors.length ? errors[0] : ''}}
                                    </div>
                                </div>
                            </validationProvider>

                            <!-- Indirizzo -->
                            <validationProvider tag="div" class="col-12 col-sm-6 validation_provider mb-4" name="guest_address" rules="required|min:3|max:155" v-slot="{errors}">
                                <div class="form-floating">
                                    <input v-model="form.guest_address" type="text" name="guest_address" class="form-control text-black bg-dark text-white border-0" id="guest_address" placeholder="Indirizzo">
                                    <label for="guest_address">Indirizzo</label>

                                    <div class="error mt-2 text-primary">
                                        {{ errors.length ? errors[0] : ''}}
                                    </div>
                                </div>
                            </validationProvider>

                            <!-- Phone -->
                            <validationProvider tag="div" class="col-12 col-sm-6 validation_provider mb-4" name="guest_phone" :rules="{required: true, regex:/^(32[^15]|33[^20]|34[0-9]|35[^2-46-9]|36[^45790]|37[^6]|38[^125-7]|39[^4-689])(\d){5,7}$/}" v-slot="{errors}">
                                <div class="form-floating">
                                    <input v-model="form.guest_phone" type="phone" name="guest_phone" class="form-control text-black bg-dark text-white border-0" id="guest_phone" placeholder="Telefono">
                                    <label for="guest_phone">Telefono</label>

                                    <div class="error mt-2 text-primary">
                                        {{ errors.length ? errors[0] : ''}}
                                    </div>
                                </div>
                            </validationProvider>

                            <!-- Message -->
                            <validationProvider tag="div" class="col-12 validation_provider mb-4" name="guest_message" rules="required" v-slot="{errors}">
                                <div class="form-floating">
                                    <textarea v-model="form.guest_message" class="form-control bg-dark border-0 text-white" placeholder="Messaggio" name="guest_message" id="guest_message" style="height: 200px"></textarea>
                                    <label for="guest_message">Messaggio</label>

                                    <div class="error mt-2 text-primary">
                                        {{ errors.length ? errors[0] : ''}}
                                    </div>
                                </div>
                            </validationProvider>

                            <!-- btn send -->
                            <div class="col-12 btn-send">
                                <button type="submit" class="btn btn-primary text-white px-5">Invia</button>
                                <span class="px-4" v-if="statusSendMessage != ''">{{statusSendMessage}}</span>
                            </div>
                        </div>
                    </form>
                </ValidationObserver>
                
            </div>
        </section>

    </layout>

</template>

<script>
import layout from '../layouts/layout.vue';

    export default {
        name: 'contact',
        components: {
            layout,
        },
        data() {
            return {

                // form
                form: {
                    guest_name: '',
                    guest_email: '',
                    guest_address: '',
                    guest_phone: '',
                    guest_message: ''
                },

                // status send message
                statusSendMessage: '',
            }
        },

        methods: {
            // send message form
            sendMessage() {
                // then success validation form
                this.$refs.form.validate().then(success => {

                    // if success
                    if(success) {
                        // Resetting value form
                        this.form.guest_name = this.form.guest_surname = this.form.guest_email = this.form.guest_address = this.form.guest_phone = this.form.guest_message = '';

                        // refs form reset
                        this.$nextTick( () => {
                            this.$refs.form.reset();
                        });

                        // Set true status send message
                        setTimeout(() => {
                            this.statusSendMessage = 'Grazie, Il tuo messaggio è stato inviato con successo, riceverai una risposta entro 24h!';

                            // set undefined statusSendMessage
                            setTimeout(() => {
                                this.statusSendMessage = '';
                            }, 5000);
                        }, 100);
                    }
                });
            }
        }
    }
</script>

<style lang="scss" scoped>

#contact {

    input {
        box-shadow:  0 1rem 3rem rgba(white, .175) inset;
    }

    textarea {
        box-shadow:  0 1rem 3rem rgba(white, .175) inset;
        resize: none;
    }
}

</style>