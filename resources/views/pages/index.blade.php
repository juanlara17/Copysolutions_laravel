@extends('../layouts.layout')


@section('container')
    <a href="{{route('store.index')}}">Abrir</a>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="row">
                        <div class="span3">
                            <div class="box aligncenter">
                                <div class="aligncenter icon">
                                    <i class="icon-tag icon-circled icon-64 active"></i>
                                </div>
                                <div class="text">
                                    <h6>Branding</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                    </p>
                                    <a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="box aligncenter">
                                <div class="aligncenter icon">
                                    <i class="icon-print icon-circled icon-64 active"></i>
                                </div>
                                <div class="text">
                                    <h6>Digital Print</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                    </p>
                                    <a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="box aligncenter">
                                <div class="aligncenter icon">
                                    <i class="icon-bullhorn icon-circled icon-64 active"></i>
                                </div>
                                <div class="text">
                                    <h6>Marketing</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                    </p>
                                    <a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="box aligncenter">
                                <div class="aligncenter icon">
                                    <i class="icon-edit icon-circled icon-64 active"></i>
                                </div>
                                <div class="text">
                                    <h6>Stationery</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                    </p>
                                    <a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- divider -->
            <div class="row">
                <div class="span12">
                    <div class="solidline">
                    </div>
                </div>
            </div>
            <!-- end divider -->
            <!-- Portfolio Projects -->
            <div class="row" id="portfolio">
                <div class="span12">
                    <h4 class="heading">Some of recent <strong>works</strong></h4>
                    <div class="row">
                        <section id="projects">
                            <ul id="thumbs" class="portfolio">

                                <!-- Item Project and Filter Name 1 -->
                                <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" href="{{ asset('images/services/digital_print_1.jpg') }}">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/services/digital_print_1.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name 2-->
                                <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Office" href="img/works/full/image-02-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/services/print2.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name 3-->
                                <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="img/works/full/image-03-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/services/print3.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name 4-->
                                <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="img/works/full/image-04-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/services/branding_2.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name 1 -->
                                <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" href="img/works/full/image-01-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/services/digital_print_1.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name 2-->
                                <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Office" href="img/works/full/image-02-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/services/print2.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name 3-->
                                <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="img/works/full/image-03-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/services/print3.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name 4-->
                                <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="img/works/full/image-04-full.jpg">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <!-- Thumb Image and Description -->
                                    <img src="{{ asset('images/services/branding_2.jpg') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                </li>
                                <!-- End Item Project -->

                            </ul>
                        </section>
                    </div>
                </div>
            </div>
            <!-- End Portfolio Projects -->
            <!-- divider -->
            <div class="row">
                <div class="span12">
                    <div class="solidline">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

