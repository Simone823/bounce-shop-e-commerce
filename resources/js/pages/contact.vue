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
                <div class="row references_wrapper mb-4">
                    <h2 class="text-uppercase fw-bold">Bounce shop - E-commerce shop</h2>
                    <p class="fw-bolder fs-5">Indirizzo: <span class="fw-normal">Via Esempio 1, italia</span></p>
                    <p class="fw-bolder fs-5">Telefono: <span class="fw-normal">000 000 0000</span></p>
                </div>

                <!-- form -->
                <form action="">
                    <!-- row inputs -->
                    <div class="row inputs_wrapper">

                        <!-- Name -->
                        <div class="col-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input v-model="form.guest_name" type="text" name="guest_name" class="form-control text-black bg-dark text-white border-0" id="floatingInput" placeholder="Nome">
                                <label for="guest_name">Nome</label>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input v-model="form.guest_email" type="email" name="guest_email" class="form-control text-black bg-dark text-white border-0" id="floatingInput" placeholder="name@example.com">
                                <label for="guest_email">Email address</label>
                            </div>
                        </div>

                        <!-- Indirizzo -->
                        <div class="col-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input v-model="form.guest_address" type="text" name="guest_address" class="form-control text-black bg-dark text-white border-0" id="floatingInput" placeholder="Via/Piazza">
                                <label for="guest_address">Indirizzo</label>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input v-model="form.guest_phone" type="number" name="guest_phone" class="form-control text-black bg-dark text-white border-0" id="floatingInput" placeholder="Telefono">
                                <label for="guest_phone">Telefono</label>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea v-model="form.guest_message" class="form-control bg-dark text-white border-0" placeholder="Scrivi il messaggio qui" name="guest_message" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="guest_message">Messaggio</label>
                            </div>
                        </div>

                        <!-- btn send -->
                        <div class="col-12 btn-send">
                            <button type="submit" class="btn btn-primary text-white px-5">Invia</button>
                            <span></span>
                        </div>
                    </div>
                </form>

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
            }
        }
    }
</script>

<style lang="scss" scoped>

#contact {

    input {
        box-shadow:  0 1rem 3rem rgba(white, .175) inset;
        margin-bottom: 40px;
    }

    textarea {
        box-shadow:  0 1rem 3rem rgba(white, .175) inset;
        margin-bottom: 40px;
    }
}

</style>