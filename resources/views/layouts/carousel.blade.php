<section class="carousel-section container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
{{--            @dd($slider)--}}
            @foreach($slider as $key=>$slide)
                @if ($key === 0)
                    <div class="carousel-item active">
                        <img class="resize-image d-block w-100" src="{{ asset(ProductImageStorage($slide->image)) }}" alt="{{ $slide->slug }}">
                    </div>
                @else
                <div class="carousel-item ">
                    <img class="resize-image d-block w-100" src="{{ asset(ProductImageStorage($slide->image)) }}" alt="{{ $slide->slug }}">
                </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
