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
            @auth
                @if ($user->rol === 'lezer')
                    @if (!$lend->isEmpty())    
                    <button class="main-button">
                        Sorry this book has already been loaned.
                    </button>
                    @else
                        @if (!$reserved->isEmpty())
                            @if ($reserved->first()->user_id === $user->id)
                                <form action="{{ route('book.deletereservation', $reservation->id) }}" method="POST">
                                    @csrf
                                    <button class="main-button">
                                        Cancel reservation
                                    </button>
                                </form>
                            @else    
                                <button class="main-button">
                                    Sorry this book has already been reserved.
                                </button>
                            @endif
                        @else
                            <form action="{{ route('book.reserve', $book->id) }}" method="POST">
                                @csrf
                                <button class="main-button">
                                    Reserve
                                </button>
                            </form>
                        @endif
                    @endif
                @endif
                @if ($user->rol === 'werknemer')
                    @if (!$lend->isEmpty())    
                        <button class="main-button">
                            Sorry this book has already been loaned.
                        </button>
                    @else
                        @if (!$reserved->isEmpty())    
                        <button class="main-button">
                            Sorry this book has already been reserved.
                        </button>
                        @else
                            <form action="{{ route('book.loan', $book->id) }}" method="POST">
                                @csrf
                                <button class="main-button">
                                    Loan
                                </button>
                            </form>
                        @endif
                    @endif
                @endif
            @endauth
        </div>
    </div>
@endsection