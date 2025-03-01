<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    // public $timestamps=false;

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
