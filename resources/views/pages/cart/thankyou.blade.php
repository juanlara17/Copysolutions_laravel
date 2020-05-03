@extends('layouts.layout')

@section('title', 'Thank You!')

@section('container')

    <div class="thank-you-section">
        <h1>Thank You for <br> You Order!</h1>
        <p>confirmation email was sent</p>
        <div class="">
            <a href="{{ url('/') }}" class="button">Home Page</a>
        </div>
    </div>
@endsection
