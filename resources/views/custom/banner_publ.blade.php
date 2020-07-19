<!--Section de banner de publicidad-->
<section class="publ container">

    <div class="publ___content">
        @foreach ($slider_secondary as $slide)
            <div class="public">
                    <div class="inner">
                        <a href="{{ route('store.show', $slide->slug) }}">
                        <p>
                            {{ $slide->name }}
                            <br>
                        </p>
                            <img src="{{ asset(ProductImageStorage($slide->image)) }}" alt="{{ $slide->slug }}"/>
                        </a>
                    </div>
            </div>
        @endforeach
    </div>
</section>
<!-- Fin de banner de publicidad-->
