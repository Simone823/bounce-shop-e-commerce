<!-- Footer -->
<footer class="bg-dark pt-5 pb-3">
    <div class="container">

        <!-- row referenze -->
        <div class="row mb-4 justify-content-center gy-4">
            <!-- Servizi al cliente -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <!-- Title -->
                <div class="title mb-4">
                    <h4 class="mb-0 text-uppercase fw-bold">Servizi al cliente</h4>
                </div>

                <!-- links -->
                <ul class="list_link list-unstyled">
                    <li class="mb-2">
                        <a class="link-light text-decoration-none" href="/login">Accedi</a>
                    </li>
                    <li class="mb-2">
                        <a class="link-light text-decoration-none" href="/register">Registrati</a>
                    </li>
                    <li class="mb-2">
                        <a class="link-light text-decoration-none" href="/contact">Contatti</a>
                    </li>
                    <li>
                        <a class="link-light text-decoration-none" href="/cart-shop">Il tuo carrello</a>
                    </li>
                </ul>
            </div>

            <!-- Referenze shop -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <!-- Title -->
                <div class="title mb-4">
                    <h4 class="mb-0 text-uppercase fw-bold">Bounce Shop E-commerce</h4>
                </div>

                <!-- list detail -->
                <ul class="detail_list list-unstyled">
                    <li class="mb-2">
                        <p class="fw-bold">
                            <i class="fa-solid fa-location-dot"></i>
                            Indirizzo:
                            <span class="fw-normal">Via Esempio 1, Italia</span>
                        </p>
                    </li>
                    <li class="mb-2">
                        <p class="fw-bold">
                            <i class="fa-solid fa-phone"></i>
                            Telefono:
                            <span class="fw-normal">000 000 0000</span>
                        </p>
                    </li>
                    <li>
                        <p class="fw-bold">
                            <i class="fa-solid fa-envelope"></i>
                            E-mail:
                            <span class="fw-normal">bounceshop@info.it</span>
                        </p>
                    </li>
                </ul>
            </div>

            <!-- Connettiti con noi -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <!-- Title -->
                <div class="title mb-4">
                    <h4 class="mb-0 text-uppercase fw-bold">Connetti con noi</h4>
                </div>

                <!-- list social -->
                <ul class="social_list list-unstyled d-flex align-items-center flex-wrap mb-4">
                    <li>
                        <a class="d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-facebook-f fs-5"></i></a>                        
                    </li>
                    <li>
                        <a class="d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-instagram fs-5"></i></a>
                    </li>
                    <li>
                        <a class="d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-twitter fs-5"></i></a>
                    </li>
                    <li>
                        <a class="d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-soundcloud fs-5"></i></a>
                    </li>
                    <li>
                        <a class="d-flex justify-content-center align-items-center" href=""><i class="fa-brands fa-soundcloud fs-5"></i></a>
                    </li>
                </ul>

                <!-- carte di credito accettate -->
                <ul class="credit_card_list list-unstyled d-flex align-items-center flex-wrap">
                    <li>
                        <i class="fa-brands fa-cc-visa fs-1"></i>
                    </li>
                    <li>
                        <i class="fa-brands fa-cc-mastercard fs-1"></i>
                    </li>
                    <li>
                        <i class="fa-brands fa-cc-amex fs-1"></i>
                    </li>
                    <li>
                        <i class="fa-brands fa-cc-stripe fs-1"></i>
                    </li>
                    <li>
                        <i class="fa-solid fa-money-check fs-1"></i>
                    </li>
                </ul>
            </div>
        </div>

        <!-- row copyright -->
        <div class="row">
            <div class="col-12 text-center">
                <h6>
                    <i class="fa-solid fa-copyright"></i>
                    Copyright 2022, Bounce Shop E-commerce
                </h6>
                <h6>Powered by <a class="text-decoration-none fw-bold" href="https://simonedaglio.web.app/">@Simone Daglio</a></h6>
            </div>
        </div>

    </div>
</footer>

<style>
    footer {
        color: white;
    }

    .social_list {
        column-gap: 20px;
        row-gap: 20px;
    }

    .social_list > li > a {
        color: #1e90ff;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 2px solid #1e90ff;
        text-decoration: none;
        cursor: pointer;
    }

    .social_list > li > a:hover {
        color: white;
        background-color: #1e90ff;
        border: 2px solid white;
        transition: all 300ms linear;
    }

    .credit_card_list {
        column-gap: 25px;
        row-gap: 20px;
    }
</style>