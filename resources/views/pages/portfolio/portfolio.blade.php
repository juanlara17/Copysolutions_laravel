@extends('pages.portfolio.layout')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/portfolio/porftolio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles/main_styles.css') }}">
@endsection
@section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                        <h2>Portfolio <strong></strong></h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li><a href="">Portfolio</a><i class="icon-angle-right"></i></li>
                        <li class="active">Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center" id="products">
        <div class="grid effect-4" id="grid"></div>
    </div>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <ul class="portfolio-categ filter">
                        <li class="all active"><a href="#">All</a></li>
                        <li class="web"><a href="#" title="">Web design</a></li>
                        <li class="icon"><a href="#" title="">Icons</a></li>
                        <li class="graphic"><a href="#" title="">Graphic design</a></li>
                    </ul>
                    <div class="clearfix">
                    </div>
                    <div class="row">
                        <section id="projects">
                            <ul id="thumbs" class="portfolio">
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span4 design" data-id="id-0" data-type="web">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('images/portfolio/business-card.jpg') }}">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <img src="{{ asset('images/portfolio/business-card.jpg') }}"  alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    <!-- Thumb Image and Description -->
                                    <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div>
                                                <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>

                                            </div>
                                        </div>
                                        <div class="ml-auto text-right">
                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                            <div class="product_price text-right">$3<span>.99</span></div>
                                        </div>
                                    </div>
                                    <div class="product_buttons">
                                        <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                            <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                <div><div><img src="{{ asset('asset/images/cart.svg') }}" class="svg" alt=""><div>+</div></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Item Project -->
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span4 design" data-id="id-1" data-type="icon">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('images/portfolio/posters.jpg') }}">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/portfolio/posters.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span4 photography" data-id="id-2" data-type="graphic">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('images/portfolio/image-08.jpg') }}">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/portfolio/image-08.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span4 design" data-id="id-0" data-type="web">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="img/works/full/image-04-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="img/works/thumbs/image-04.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span4 photography" data-id="id-4" data-type="graphic" >
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="img/works/full/image-05-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="img/works/thumbs/image-05.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span4 photography" data-id="id-5" data-type="icon" >
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="img/works/full/image-06-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="img/works/thumbs/image-06.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span4 design" data-id="id-0" data-type="web" >
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="img/works/full/image-07-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="img/works/thumbs/image-07.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span4 design" data-id="id-0" data-type="web" >
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="img/works/full/image-08-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="img/works/thumbs/image-08.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
