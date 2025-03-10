<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Book extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    // public $timestamps=false;

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function Title():Attribute{
        return Attribute::make(
            get: fn($value)=>ucwords($value)
        );
    }

    public function Author():Attribute{
        return Attribute::make(
            get: fn($value)=>strtoupper($value),
        );
    }
}
