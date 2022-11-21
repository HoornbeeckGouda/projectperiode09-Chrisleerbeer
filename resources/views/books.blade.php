@extends('layouts.app')

@section('content')
    <div class="banner-books">
        <h1 class="banner-title">THE <br><span class="colored-text">NEWEST</span><br> BOOKS <br>FOR YOU</h1>
        <p class="banner-quote">“A book is a gift you can open again and again.”<br>- Garrison Keillor</p>
    </div>
    <div class="books-collection">
        <h3 class="collection-title">OUR <span class="colored-text">COLLECTION</span></h3>
        <div class="books">
            @foreach($books as $book)
                <div class="book">
                    <a class="book-link" href="{{ route('book', $book->id) }}">
                        <img class="book-image" src="{{ asset('storage/images/book.svg') }}">
                        {{ $book->title }}
                        <p class="grey-text">By: {{ $book->writer }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection