@extends('layouts.layout')

@section('styles')
    <!-- Select2 -->
{{--    <link rel="stylesheet" href="{{ asset('css/styles_store.css') }}">--}}
@endsection

@section('container')

    @component('components.bradcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right bread-separator"></i>
        <strong>Shop</strong>
    @endcomponent
    <section class="products-section container">
            <div class="sidebar">
                <h3>By Category</h3>
                <ul>
                    @foreach($categories as $category)
                        <li class="{{ request()->category == $category->slug ? 'active' : ''}}"><a href="{{ route('api.store.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
                <div class="products text-center">
                   @forelse($products as $product)
                        <div class="product">
                            <a href="{{route('api.store.show', $product->slug)}}">
                                <img src="{{ $product->images->first()->url }}" alt="product">
                            </a>
                            <div class="product-content">
                                <a href="{{ route('api.store.show', $product->slug) }}">
                                    <div class="product-name">{{ $product->name  }}</div>
                                </a>
                                <div class="product-price">${{ $product->price }}</div>
                            </div>
                        </div>
                    @empty
                        <div style="text-align: left">No items found</div>
                    @endforelse
                </div>
                <div class="spacer"></div>
                {{--{{ $products->links() }}--}}
                {{ $products->appends(request()->input())->links() }}
            </div>
    </section>
@endsection
