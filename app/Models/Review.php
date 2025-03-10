<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Review extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }


    public function Review():Attribute{
        return Attribute::make(
            get: fn($value)=>ucwords($value)
        );
    }
}
