<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class bookLoan extends Model
{
    public $timestamps = false;
    protected $fillable = [
    'id',
    'user_id', 
    'book_id', 
    'lend_date', 
    'end_date',
    'returned'
    ];

    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
