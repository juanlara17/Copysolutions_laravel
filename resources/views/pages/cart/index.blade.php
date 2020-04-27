@extends('layouts.layout')

@section('title','Shopping Cart')

@section('container')
    @component('components.bradcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <strong> Shopping Cart</strong>
    @endcomponent

    <div class="cart-section container">
        <div>
            @if(\Cart::getContent()->count() > 0)
                <h2> {{ \Cart::getContent()->count() }} item(s) in Shopping Cart</h2>

                <div class="cart-table">
                    @foreach(\Cart::getContent() as $item)
                        {{--                {{ dd($item) }}--}}
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{--{{ route('api.store.show', $item->model->slug) }}--}}">
                                    <img class="cart-table-img" src="{{--{{ $item->model->image }}--}}" alt="item">
                                </a>
                                <div class="cart-table-details">
                                    <div class="cart-table-item"><a
                                            href="{{--{{route('api.store.show', $item->model->slug)}}--}}">{{--{{ $item->model->name }}--}}</a>
                                    </div>
                                    <div class="cart-table-description">{{--{{ $item->model->description }}--}}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart-options">Remove</button>
                                    </form>

                                    <form action="" method="POST">
                                        @csrf
                                        <button type="submit" class="cart-options">Save for Later</button>
                                    </form>
                                </div>
                                <div>
                                    <select name="" id="" class="quantity">
                                        @for($i=1; $i < 5 + 1; $i++)

                                        @endfor
                                    </select>
                                </div>
                                <div></div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(! session()->has('coupon'))
                    <a href="#" class="have-code">Have a code?</a>
                    <div class="have-code-container">
                        <form action="" method="POST">
                            @csrf
                            <input type="text" name="coupon_code" id="coupon_code">
                            <button type="submit" class="button button-plain">Apply</button>
                        </form>
                    </div>
                @endif

                <div class="cart-totals">
                    <div class="cart-totals-left">
                        Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t
                        feel like figuring out :).
                    </div>
                    <div class="cart-total-right">
                        <div>
                            Subtotal <br>
                            @if(session()->has('coupon'))
                                Code ()
                                <form action="" method="POST" style="display: block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="font-size: 14px">Remove</button>
                                </form>
                                <hr>
                            @endif
                        </div>
                        Tax () <br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                </div>
                <div class="cart-totals-subtotal">
                    <br>
                    @if(session()->has('coupon'))

                        <span class="cart-totals-total">Total</span>
                    @endif
                </div>


                <div class="cart-buttons">
                    <a href="" class="button">Continue Shopping</a>
                    <a href="" class="button-primary">Proceed to Checkout</a>
                </div>

            @else
                <h3>No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="" class="button">Continue Shopping</a>
                <div class="spacer"></div>
            @endif

            @if (/*Cart::instance('saveForLater')->count()*/ 1 > 0)
                <h2>{{--{{ Cart::instance('saveForLater')->count() }} --}}item(s) Saved For Later</h2>
                <div class="saved-for-later cart-table">
                   {{-- @foreach (/*Cart::instance('saveForLater')->content() as $item*/)--}}
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{--{{ route('shop.show', $item->model->slug) }}--}}"><img
                                        src="{{--{{ asset('img/products/'.$item->model->slug.'.jpg') }}--}}" alt="item"
                                        class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a
                                            href="{{--{{ route('shop.show', $item->model->slug) }}--}}">{{--{{ $item->model->name }}--}}</a>
                                    </div>
                                    <div class="cart-table-description">{{--{{ $item->model->details }}--}}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    <form action="{{--{{ route('saveForLater.destroy', $item->rowId) }}--}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="cart-options">Remove</button>
                                    </form>

                                    <form action="{{--{{ route('saveForLater.switchToCart', $item->rowId) }}--}}" method="POST">
                                        @csrf
                                        <button type="submit" class="cart-options">Move to Cart</button>
                                    </form>
                                </div>
                                <div>{{--{{ $item->model->presentPrice() }}--}}</div>
                            </div>
                        </div> <!-- end cart-table-row -->
{{--                    @endforeach--}}
                </div> <!-- end saved-for-later -->
            @else
                <h3>You have no items Saved for Later.</h3>
            @endif
        </div>
    </div>


@endsection
