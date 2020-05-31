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
            {{-- MESSAGE ALERT --}}
            @include('custom.message')

            {{-- SHOPPIN CART--}}
            @if(\Cart::session('default')->getContent()->count() > 0)
{{--                @dump(\Cart::session('default')->getContent())--}}
                <h2> {{ \Cart::session('default')->getContent()->count() }} item(s) in Shopping Cart</h2>

                <div class="cart-table">
                    @foreach(\Cart::session('default')->getContent() as $item)
                         {{--{{ dd(\Cart::session('default')->getContent()) }}--}}


                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('store.show', $item->model->slug) }}">
                                    <img class="cart-table-img" src="{{ ProductImageStorage($item->model->image) }}" alt="item">
                                </a>
                                <div class="cart-table-details">
                                    <div class="cart-table-item"><a
                                            href="{{route('store.show', $item->model->slug)}}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="cart-table-description">{{ $item->model->extract }}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart-options">Remove</button>
                                    </form>

                                    <form action="{{ route('cart.saveOrderForLater', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="cart-options">Save for Later</button>
                                    </form>
                                </div>
                                <div>
{{--                                    @dump($item->quantity)--}}
                                   {{-- <select class="quantity" data-id="{{ $item->id }}">
                                        @for($i = 1; $i < 5 + 1; $i++)
                                            <option {{ $item->quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor

                                    </select>--}}
                                    <div class="cart-info quantity" data-id="{{ $item->id }}">
                                        <div class="btn-increment-decrement" onClick="decrement_quantity( {{ $item->id }} , {{ presentPrice($item->model->price) }} )">-</div>
                                        <input class="input-quantity" id="input-quantity-{{ $item->id }}" value="{{ $item->quantity }}">
                                        <div class="btn-increment-decrement" onClick="increment_quantity( {{ $item->id }} , {{ presentPrice($item->model->price) }} )">+</div>
                                    </div>
                                </div>
{{--                                {{ dd($item) }}--}}
                                <div class="cart-table-price">
                                    <div id="cart-price-{{ $item->model->id }}">${{ presentPrice($item->model->price * $item->quantity ) }}</div>
                                    <div class="cart-table-price_unit">${{ presentPrice($item->model->price) }}</div>
                                </div>

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
                    <div class="cart-totals-right">
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
                            Tax ({{ config('cart.tax') }}%) <br>
                            <span class="cart-totals-total">Total</span>
                        </div>
                        <div class="cart-totals-subtotal">
                            {{ presentPrice(Cart::session('default')->getSubTotal()) }}<br>
                          {{--  @if(session()->has('coupon'))
                                -{{ presentPrice($discount ?? '') }} <br>&nbsp;<br>
                                <hr>
                                {{ presentPrice($newSubtotal) }}
                                <span class="cart-totals-total">Total</span>
                            @endif--}}
                            {{ presentPrice($newTax) }} <br>
                            <span class="cart-totals-total">${{ presentPrice($newTotal ?? '') }}</span>
                        </div>
                    </div>
                </div>



                <div class="cart-buttons">
                    <a href="{{ route('store.index') }}" class="button">Continue Shopping</a>
                    <a href="{{ route('checkout.index') }}" class="button-primary">Proceed to Checkout</a>
                </div>

            @else
                <h3>No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="{{ route('store.index') }}" class="button">Continue Shopping</a>
                <div class="spacer"></div>
            @endif

            @if ( \Cart::session('saveForLater')->getContent()->count() > 0)
                <h2>{{ \Cart::session('saveForLater')->getContent()->count() }} item(s) Saved For Later</h2>
                <div class="saved-for-later cart-table">
                    @foreach (\Cart::session('saveForLater')->getContent() as $item)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('store.show', $item->model->slug) }}"><img
                                        src="{{ asset($item->model->images->first()->url) }}" alt="item"
                                        class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a
                                            href="{{ route('store.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="cart-table-description">{{ $item->model->extract }}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    <form action="{{ route('saveForLater.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="cart-options">Remove</button>
                                    </form>

                                    <form action="{{ route('saveForLater.switchToCart', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="cart-options">Move to Cart</button>
                                    </form>
                                </div>
                                <div>{{--{{ $item->model->presentPrice() }}--}}</div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endforeach
                </div> <!-- end saved-for-later -->
            @else
                <h3>You have no items Saved for Later.</h3>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function () {
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function (element) {
                element.addEventListener('change', function () {
                    const id =  element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        id: id,
                        quantity: this.value
                    })
                        .then(function (response) {
                            window.location.href = '{{ route('cart.index') }}'
                            console.log(response);
                        })
                        .catch(function (error) {
                            // console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })
        })();

        function increment_quantity(id, price) {
            var inputQuantityElement = $("#input-quantity-"+id);
            var newQuantity = parseInt($(inputQuantityElement).val())+1;
            console.log(newQuantity);
            // $(inputQuantityElement).val(newQuantity);
            var newPrice = newQuantity * price;
            save_to_db(id, newQuantity, newPrice);
        }
        function decrement_quantity(id, price) {
            var inputQuantityElement = $("#input-quantity-"+id);
            if($(inputQuantityElement).val() > 1){
                var newQuantity = parseInt($(inputQuantityElement).val())-1;
                // $(inputQuantityElement).val(newQuantity);
            }
            console.log(newQuantity);
            var newPrice = newQuantity * price;
            save_to_db(id, newQuantity, newPrice);
        }

        function save_to_db(cart_id, new_quantity, newPrice) {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            var priceElement = $("#cart-price-"+cart_id);
            // const id =  element.getAttribute('data-id')
            // console.log(cart_id);
            console.log(cart_id);
            axios.patch(`/cart/${cart_id}`, {
                id: cart_id,
                quantity: new_quantity
            })
                .then(function (response) {
                    // $(inputQuantityElement).val(new_quantity);
                    // $(priceElement).text("$"+newPrice);
                    window.location.href = '{{ route('cart.index') }}'
                    console.log();
                })
                .catch(function (error) {
                    // console.log(error);
                    window.location.href = '{{ route('cart.index') }}'
                });
        }
    </script>
@endsection
