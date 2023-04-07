<footer class="footer-section section" style="background-image: url(/assets/guest/images/bg/footer-bg.jpg)">
    <div class="footer-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
            <div class="row row-25">
                <div class="footer-widget col-lg-3 col-md-6 col-12">
                    <p>
                        <img class="rounded d-block d-sm-inline float-none float-sm-start me-none me-sm-1 mb-none mb-sm-1 mx-auto"
                            src="{{ asset('logo.png') }}" style="max-height: 75px;" alt="Logo">
                        <span class="h4 d-block border-bottom">{{ config('app.name') }}</span>
                        With proven track records of delivering high-quality real estate
                        services to Our numerous satisfied clients, we have a strong dedication to Customer
                        satisfaction.
                    </p>

                    <div class="footer-social">
                        <a href="javascript://#" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="javascript://#" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="javascript://#" class="instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="footer-widget col-lg-3 col-md-6 col-12">
                    <h4 class="title"><span class="text">Contact us</span><span class="shape"></span></h4>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker-alt me-2"></i>
                            <span>Abuja, FCT, Nigeria.</span>
                        </li>
                        <li>
                            <i class="fa fa-phone me-2"></i>
                            <span>
                                <a href="tel:+234-708-699-9975">+234-708-699-9975</a>
                                <a href="tel:+234-708-699-9975">+234-708-699-9975</a>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-envelope me-2"></i>
                            <span>
                                <a href="mailto:info{{ '@' . env('APP_DOMAIN') }}">info{{ '@' . env('APP_DOMAIN') }}</a>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-globe me-2"></i>
                            <span>
                                <a href="{{ route('home') }}">{{ config('app.url') }}</a>
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="footer-widget col-lg-3 col-md-6 col-12">
                    <h4 class="title"><span class="text">Useful links</span><span class="shape"></span></h4>
                    <ul>
                        <li><a href="javascript://#">Our Properties</a></li>
                        <li><a href="javascript://#">About Us</a></li>
                        <li><a href="javascript://#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="footer-widget col-lg-3 col-md-6 col-12">
                    <h4 class="title">
                        <span class="text">Seeing is believing</span><span class="shape"></span>
                    </h4>

                    <div id="latestImageSlide" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#latestImageSlide" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#latestImageSlide" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#latestImageSlide" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" style="max-height: 250px;">
                                <img src="https://i0.wp.com/wp.afri-homes.com/wp-content/uploads/2023/01/20221024_214501_0000.png?w=1080&ssl=1"
                                    class="d-block w-100 mb-0 mx-auto"
                                    alt="Image"style="max-height: inherit !important;">
                            </div>
                            <div class="carousel-item" style="max-height: 250px;">
                                <img src="https://i0.wp.com/wp.afri-homes.com/wp-content/uploads/2023/01/IMG_20221029_075637_929.jpg?resize=1024%2C1024&ssl=1"
                                    class="d-block w-100 mb-0 mx-auto"
                                    alt="Image"style="max-height: inherit !important;">
                            </div>
                            <div class="carousel-item" style="max-height: 250px;">
                                <img src="https://i0.wp.com/wp.afri-homes.com/wp-content/uploads/2023/01/20220707_035959_0000-1.png"
                                    class="d-block w-100 mb-0 mx-auto"
                                    alt="Image"style="max-height: inherit !important;">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#latestImageSlide"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#latestImageSlide"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="footer-bottom section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright text-center">
                        <p>Copyright &copy;2022 <a href="javascript://#">Khonike</a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</footer>
