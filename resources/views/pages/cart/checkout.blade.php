@extends('layouts.layout')

@section('title','Checkout')

@section('styles')

    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('container')

    @component('components.bradcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <a href="/cart">Cart</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <strong>Checkout</strong>
    @endcomponent

    <div class="container">
        {{-- MESSAGE ALERT --}}
        @include('custom.message')

        <h1 class="checkout-heading stylish-heading">Checkout</h1>
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    @csrf
                    <h2>Billing Details</h2>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        @if(auth()->user())
                            <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}"required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" name="province" id="province" class="form-control" value="{{ old('province') }}" required>
                    </div>
                    <div class="half-form">
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" name="postalcode" id="postalcode" class="form-control" value="{{ old('postalcode') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                        </div>
                    </div>
                    <div class="spacer"></div>

                    <h2>Payment Details</h2>

                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" name="name_on_card" id="name_on_card" class="form-control" value="{{ old('name_on_card') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="spacer"></div>
                    <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>
                </form>

                @if(true)
                    <div class="mt-32">or</div>
                    <div class="mt-32">
                        <h2>Pay with Paypal</h2>

                        <form action="{{ route('checkout.index') }}" method="post" id="paypal-payment-form">
                            @csrf
                            <section>
                                <div class="bt-drop-in-wrapper">
                                    <div id="bt-dropin"></div>
                                </div>
                            </section>

                            <input type="hidden" name="payment_method_nonce" id="nonce">
                            <button type="submit" class="button-primary"><span>Pay with Paypal</span></button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="checkout-table-container">
                <h2>Your Order</h2>

                <div class="checkout-table">
{{--                    {{ dd(\Cart::session('default')->getContent()) }}--}}
                    @foreach(\Cart::session('default')->getContent() as $item)
{{--                        {{ dd($item) }}--}}
                        <div class="checkout-table-row">
                            <div class="checkout-table-row-left">
                                    <img src="{{ ProductImageStorage($item->model->image) }}" alt="item" class="checkout-table-img">
                                <div class="checkout-details">
                                    <div class="checkout-table-item">{{ $item->model->name }}</div>
                                    <div class="checkout-table-description">{{ $item->model->extract }}</div>
                                    <div class="checkout-table-price">${{ $item->model->price }}</div>
                                </div>
                            </div>
                            <div class="checkout-table-row-right">
                                <div class="checkout-table-quantity">{{ $item->quantity }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Subtotal <br>
                        @if(session()->has('coupon'))
                            Discount ({{ session()->get('coupon')['name'] }}
                            <br>
                            <hr>
                            New Subtotal <br>
                        @endif
                        Tax ({{ config('config.tax') }}%)<br>
                        <span class="checkout-totals-total">Total</span>
                    </div>
                    <div class="checkout-totals-right">
                        ${{ presentPrice(Cart::session('default')->getSubTotal())  }}<br>
                        @if(session()->has('coupon'))
                            -{{ presentPrice($disconunt) }} <br>
                            <hr>
                            ${{ presentPrice($newTotal ?? '') }} <br>
                        @endif
                        ${{ presentPrice($newTax) }} <br>
                        <span class="checkout-totals-total">${{ presentPrice($newTotal ?? '') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        (function () {
            // Create a Stripe client.
            var stripe = Stripe('pk_test_CdJQoAR2NJl1hMF04PyxEzD300FwcTU5PT');

// Create an instance of Elements.
            var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

// Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

// Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

// Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

// Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                document.getElementById('complete-order').disabled = true;

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value
                }

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

// Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        })();
    </script>
@endsection
