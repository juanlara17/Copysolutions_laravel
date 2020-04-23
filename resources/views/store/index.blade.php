@extends('layouts.layout')

@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('css/styles_store.css') }}">
@endsection

@section('container')

    <section class="product-section container">
        <div class="card-store">

            <div class="sidebar">
                <h3>By Category</h3>
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{ route('api.store.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="products text-center">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
               @forelse($products as $product)
                    <div class="product">
                        <a href="{{route('api.store.show', $product->slug)}}">
                            <img src="{{ $product->images->random()->url }}" alt="product">
                        </a>
                        <a href="{{ route('api.store.show', $product->slug) }}">
                            <div class="product-name">{{ $product->name  }}</div>
                        </a>
                        <div class="product-price">{{ $product->price }}</div>
                    </div>
                @empty
                    <div style="text-align: left">No items found</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
