@extends('layouts.app')

@section('content')
    <div class="book-wrapper">
        <div class="book-image-wrapper">
            <img class="book-image" src="{{ asset('storage/images/book.svg') }}">
        </div>
        <div class="book-detail">
            <h1>{{ $book->title }}</h1>
            <h3>By {{ $book->writer }}</h3>
            <p>{{ $book->description }}</p>
                @csrf
                @if (!$reserved->isEmpty())    
                    <button class="reserve-button">
                        Sorry this book has already been reserved.
                    </button>
                @else
                    <form action="{{ route('book.reserve', $book->id) }}" method="POST">
                        <button class="reserve-button">
                            Reserve
                        </button>
                    </form>
                @endif
                {{ $book->id }}
        </div>
    </div>
@endsection