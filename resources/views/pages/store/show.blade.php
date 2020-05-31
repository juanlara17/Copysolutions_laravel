@extends('layouts.layout')

@section('title', $product->name)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('container')

    @component('components.bradcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span><a href="{{ route('store.store') }}">Shop</a></span>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <strong>{{ $product->name }}</strong>
    @endcomponent

    <div class="product-section container">

        <div class="">
            <div class="product-section-image">
                <img src="{{ ProductImageStorage($product->image) }}" alt="product" class="active" id="currentImage">
            </div>
            <div class="product-section-images">
                <div class="product-section-thumbnail selected">
                    <img src="{{ ProductImageStorage($product->image) }}" alt="product">
                </div>

                @if($product->images)
{{--                    @dd($product->images)--}}
                    @foreach(json_decode($product->images, true) as $image)
                        <div class="product-section-thumbnail">
                             <img src="{{ ProductImageStorage($image) }}" alt="product">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->name }}</h1>
            <div class="product-section-subtitle">{{ $product->extract }}</div>
            <div>{!! $stockLevel !!}</div>
            <div class="product-section-price">${{ $product->price }}</div>
            <p>
                {!! $product->description !!}
            </p>
            <p>&nbsp;</p>
{{--            @dump($product->quantity)--}}
            @if($product->quantity <= 0)
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button class="button button-plain" type="submit">Add to Cart</button>
                </form>
            @endif

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnail');
            images.forEach((element) => element.addEventListener('click', thumbnailClick));
            function thumbnailClick(e) {
                currentImage.classList.remove('active');
                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                });
                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }
        })();
    </script>
@endsection
