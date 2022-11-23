<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\BookLoan;
use App\Models\User;
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

    public function showAlert(Book $book)
    {
        // $reserved = $book->reservations;
        // $lend = $book->bookLoans;
        // $user = auth()->user();
        // return view("book", compact("book", "reserved", "lend", "user"))->with('leninginvoer', 'Voer ');
        return redirect()->route('book', $book->id)->with('leninginvoer', 'Voer ');
    }

    public function reserve(Book $book)
    {
        $user = auth()->user();
        $reserved = $book->reservations;
        $lend = $book->bookLoans;
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

    public function deleteReservation(Book $book)
    {
        Reservation::where('book_id', $book->id)->delete();
        return redirect()->route('book', $book->id)->with('success', 'Reservation cancelled successfully.');
    }

    public function loan(Request $request, Book $book, User $user)
    {

        $user = auth()->user();
        $reserved = $book->reservations;
        $lend = $book->bookLoans;
        $user_id = $user->user_id;
        if ($user->rol === "werknemer")
            if (!$lend->isEmpty())
            {
                if ($lend[0]->returned === 1)
                {
                    if (!$reserved->isEmpty())
                    {
                        return redirect()->route('book', $book->id)->with('error', 'Error book has already been reserved.');   
                    }
                    else
                    {
                        if (!$user_id->isEmpty())
                        {
                            BookLoan::create([
                                'user_id'=> $request->id,
                                'book_id'=> $book->id,
                                'lend_date'=> now(),
                                'end_date'=> now()->addDays(14),
                                'returned'=> "0"
                            ]);
                            return redirect()->route('book', $book->id)->with('success', 'Loan created succesfully.');
                        }
                        else
                        {
                            return redirect()->route('book', $book->id)->with("error", "User doesn't exist.");
                        }
                    }
                }
                else
                {
                    return redirect()->route('book', $book->id)->with('error', 'Error book has already been loaned.');
                }   
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
                return redirect()->route('book', $book->id)->with('success', 'Loan created succesfully.');
                }
            }
        else
        {
            return redirect()->route('book', $book->id)->with('error', 'Error you do not have permission to do this.');
        }
    }

    public function return(book $book)
    {
        BookLoan::where('book_id', $book->id)->update([
            'returned'=> "1"
        ]);
        return redirect()->route('book', $book->id)->with('success', 'Book returned successfully.');
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
