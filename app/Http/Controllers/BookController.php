<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\BookLoan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home() {
        return view("welcome");
    }

    public function index()
    {
        $books = Book::all();
        return view("books", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $reserved = $book->reservations;
        $lend = $book->bookLoans;
        $user = auth()->user();
        return view("book", compact("book", "reserved", "lend", "user"));
    }

    public function reserve(book $book)
    {
        $user = auth()->user();
        $reserved = Book::find(1)->reservations;
        $lend = Book::find(1)->bookLoans;
        if ($user->rol === "lezer")
            if (!$lend->isEmpty())
            {
                return redirect()->route('book', $book->id)->with('error', 'Error book has already been loaned.');    
            }
            else{
                if (!$reserved->isEmpty())
                {
                    return redirect()->route('book', $book->id)->with('error', 'Error book has already been reserved.');    
                }
                else{
                Reservation::create([
                    'user_id'=> $user->id,
                    'book_id'=> $book->id,
                    'creation_date'=> now(),
                    'expiration_date'=> now()->addDays(14)
                ]);
                return redirect()->route('book', $book->id)->with('success', 'Reservation created successfully.');
                }
            }
        else{
            return redirect()->route('book', $book->id)->with('error', 'Error you do not have permission to do this.');
        }
    }

    public function loan(book $book)
    {
        $user = auth()->user();
        $reserved = Book::find(1)->reservations;
        $lend = Book::find(1)->bookLoans;
        if ($user->rol === "werknemer")
            if (!$lend->isEmpty())
            {
                return redirect()->route('book', $book->id)->with('error', 'Error book has already been loaned.');   
            }
            else{
                if (!$reserved->isEmpty())
                {
                    return redirect()->route('book', $book->id)->with('error', 'Error book has already been reserved.');   
                }
                else{
                BookLoan::create([
                    'user_id'=> "1",
                    'book_id'=> "1",
                    'lend_date'=> now(),
                    'end_date'=> now()->addDays(14),
                    'returned'=> "0"
                ]);
                return redirect()->route('book', $book->id)->with('succes', 'Loan created succesfully.');
                }
            }
        else
        {
            return redirect()->route('book', $book->id)->with('error', 'Error you do not have permission to do this.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        //
    }
}
