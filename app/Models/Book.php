<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'price', 'stock', 'book_category_id'];


    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('issued_at', 'returned_at')->withTimestamps();
    }


    public function borrow()
    {
        if ($this->stock > 0) {
            $this->decrement('stock');
            return true;
        }
        return false;
    }

    public function return()
    {
        $this->increment('stock');
    }

}
