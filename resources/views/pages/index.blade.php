@extends('../layouts.layout')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/slick-1.8.1/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/slick-1.8.1/slick/slick-theme.css') }}"/>
@endsection

@section('container')

    <!-- CAROUSEL -->
    @include('layouts.carousel')

    <!--BANNER PUBLICIDAD -->
    @include('custom.banner_publ')


    <section id="content">

        <!-- Section de  envios y pagos-->
        <section class="envios container">
            <div class="envios__content">
                <div>
                    <img src="{{ asset('asset/images/camion.png') }}" alt="">
                    <p>ENVIO A CUALQUIER LUGAR</p>
                </div>
                <div>
                    <img src="{{ asset('asset/images/pagar.png') }}" alt="">
                    <p>ACEPTAMOS CUALQUIER MEDIO DE PAGOS</p>
                </div>
                <div>
                    <img src="{{ asset('asset/images/contraentrega.png') }}" alt="">
                    <p>PAGO CONTRA ENTREGA</p>
                </div>
            </div>
        </section>
        <!-- Fin de section de envios y pagos-->

        <!--Section de productos recomendados-->
        <section class="product">
            <h1>PRODUCTOS RECOMENDADOS</h1>
            <div class="product__carousel">
                <div class="product-item">
                    <div class="product--slid">
                        <div class="image__container">
                            <img src="{{ asset('asset/images/prod1.jpg') }}" alt="Flayers"
                                 style="width: 100%; height: auto; max-width:600px; ">
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.html">Business Card</a></div>

                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="product_category">In <a href="category.html">Category</a></div>
                                        <div class="product_price text-right">$3<span>.99</span></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="" itemprop="url "> </a><a href="/store/business-card">
                                    <button class="button ">Shop Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="product--slid">
                        <div class="image__container">
                            <img src="{{ asset('asset/images/prod3.jpg') }}" alt="Flayers"
                                 style="width: 100%; height: auto; max-width:600px; ">
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.html">Brochure</a></div>

                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="product_category">In <a href="category.html">Category</a></div>
                                        <div class="product_price text-right">$3<span>.99</span></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="#" itemprop="url "> </a><a href="/store/brochure">
                                    <button class="button ">Shop Now</button>
                                </a></div>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="product--slid">
                        <div class="image__container">
                            <img src="{{ asset('images/poster.jpg') }}" alt="Flayers"
                                 style="width: 100%; height: auto; max-width:600px; ">
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.html">Posters</a></div>

                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="product_category">In <a href="category.html">Category</a></div>
                                        <div class="product_price text-right">$3<span>.99</span></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="#" itemprop="url "> </a><a href="/store/poster">
                                    <button class="button ">Shop Now</button>
                                </a></div>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="product--slid">
                        <div class="image__container">
                            <img src="{{ asset('asset/images/prod4.jpg') }}" alt="Flayers"
                                 style="width: 100%; height: auto; max-width:600px; ">
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.html">Flayers</a></div>

                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="product_category">In <a href="category.html">Category</a></div>
                                        <div class="product_price text-right">$3<span>.99</span></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="#" itemprop="url "> </a><a href="#">
                                    <button class="button ">Shop Now</button>
                                </a></div>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="product--slid">
                        <div class="image__container">
                            <img src="{{ asset('asset/images/product5.jpg') }}" alt="Flayers"
                                 style="width: 100%; height: auto; max-width:600px; ">
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.html">Flags</a></div>

                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="product_category">In <a href="category.html">Category</a></div>
                                        <div class="product_price text-right">$3<span>.99</span></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="#" itemprop="url "> </a><a href="#">
                                    <button class="button ">Shop Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="product--slid">
                        <div class="image__container">
                            <img src="{{ asset('asset/images/prod2.png') }}" alt="Flayers"
                                 style="width: 100%; height: auto; max-width:600px; ">
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.html">Design Web</a></div>

                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="product_category">In <a href="category.html">Category</a></div>
                                        <div class="product_price text-right">$3<span>.99</span></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="#" itemprop="url "> </a><a href="#">
                                    <button class="button ">Shop Now</button>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product__vrmas">
                <button type="submit" role="link" onclick="window.location='{{ route('store.index') }}'">Ver más...
                </button>
            </div>
        </section>
        <!-- Fin Section de productos recomendados-->

        <!-- Section  services-->
        <section class="services-list">
            <h1>Services</h1>
            <div class="services__content">
                <div class="services__content--item">
                    <img src="{{ asset('asset/images/service1.png') }}" alt="">
                    <p>Digital Print</p>
                </div>
                <div class="services__content--item">
                    <img src="{{ asset('asset/images/service2.png') }}" alt="">
                    <p>Marketing</p>
                </div>
                <div class="services__content--item">
                    <img src="{{ asset('asset/images/service3png.png') }}" alt="">
                    <p>Branding</p>
                </div>
                <div class="services__content--item">
                    <img src="{{ asset('asset/images/service4.png') }}" alt="">
                    <p>Stationery</p>
                </div>
                <div class="services__content--item">
                    <img src="{{ asset('asset/images/service5.png') }}" alt="">
                    <p>deliverys</p>
                </div>
            </div>
        </section>
        <!-- Fin de section servicess-->

        @include('layouts.slide-category')

        <!-- Section  bannerbotton-->
        <section class="bannerbotton">
            <div class="bannerbotton__content">
                <img src="{{asset('images/bannerenvio.png')}}" alt="">
                <div class="bannerbotton_content--btn">
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">

                    <button>
                        CONTRATA AQUÍ
                    </button></a>
                </div>
            </div>
        </section>
    </section>

    <div class="button_wsp">
        <a href="https://wa.me/18325288559?text=Hi!%20Can%20you%20help%20me?" target="_blank" class="appWsp">
            <img src="{{ asset('images/icons/icon_whatsapp.png') }}" alt="icon_whatsapp">
        </a>
    </div>

    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 font-weight-bold">Thank you for contact us!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
                        <input type="text" id="defaultForm-email" class="form-control validate">
                    </div>
                    <div class="md-form mb-5">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
                        <input type="email" id="defaultForm-email" class="form-control validate">
                    </div>
                    <div class="md-form mb-4">
                        <i class="fa fa-pencil prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Message</label>
                        <textarea type="text" id="defaultForm-pass" class="form-control validate"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default">Send Message</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/slick-1.8.1/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
@endsection

