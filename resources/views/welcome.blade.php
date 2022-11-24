@extends('layouts.app')

@section('content')
    <div class="banner-main">
        <div class="banner-title">
            <h1>The <br><span class="colored-text">newest</span><br> books <br>for you</h1>
        </div>
        <div class="banner-images">
            <img class="banner-image focus-image" src="{{ asset('storage/images/silmarillion.jpg') }}">
            <img class="banner-image" src="{{ asset('storage/images/wolfskinderen.jpg') }}">
            <img class="banner-image" src="{{ asset('storage/images/narnia.jpg') }}">
            <img class="banner-image" src="{{ asset('storage/images/art of war.jpg') }}">
        </div>
    </div>
    <div class="banner-bar">
        <img src="{{ asset('storage/images/bar.svg') }}">
    </div>
    <div class="quote">
        <p>“A reader lives a thousand lives before he dies . . .  The man who never reads lives only one.”<br>- George R.R. Martin</p>
    </div>
    <div class="subscriptions">
        <div class="subscriptions-title">
            <h2>OUR <span class="colored-text">SUBSCRIPTIONS</span></h2>
        </div>
        <div class="subscription-cards">
            <a href="{{ route('subscription', '1') }}">
                <div class="subscription-card basic-subscription">
                    <div class="card-bar"></div>
                    <div class="card-title">
                        <h3>BASIC</h3>
                    </div>
                    <div class="card-price">
                        <h3>€5</h3>
                    </div>
                    <div class="card-length">
                        <h3>PER MONTH</h3>
                    </div>
                    <div class="book-amount">
                        <h3>5 BOOKS</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('subscription', 2) }}">
                <div class="subscription-card standard-subscription">
                    <div class="card-bar"></div>
                    <div class="card-title">
                        <h3>STANDARD</h3>
                    </div>
                    <div class="card-price">
                        <h3>€10</h3>
                    </div>
                    <div class="card-length">
                        <h3>PER MONTH</h3>
                    </div>
                    <div class="book-amount">
                        <h3>10 BOOKS</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('subscription', 3) }}">
                <div class="subscription-card premium-subscription">
                    <div class="card-bar"></div>
                    <div class="discount-bar">
                        <p>50%</p>
                    </div>
                    <div class="card-title">
                        <h3>PREMIUM</h3>
                    </div>
                    <div class="price">
                        <div class="card-price">
                            <h3>€12</h3>
                        </div>
                        <div class="original-price">
                            <h3>€24</h3>
                        </div>
                    </div>
                    <div class="card-length">
                        <h3>PER MONTH</h3>
                    </div>
                    <div class="book-amount">
                        <h3>15 BOOKS</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @foreach ($loan_history as $loan_history)
        <p>{{ $loan_history->book_id }}</p>
    @endforeach
@endsection
