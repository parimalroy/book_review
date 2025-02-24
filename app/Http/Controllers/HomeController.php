<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //this method show book list home page
    public function index(Request $request){
        $books=Book::inrandomorder()->where('status',1);
        if(!empty($request->keyword)){
            $books=Book::where('title','like','%'.$request->keyword.'%');
        }
        $books=$books->paginate(8);
        return view('frontend.book.home',['books'=>$books]);

    }


    // this method show book details
    public function details($id){
        $book =Book::findOrFail($id);
        $ReletedBooks =Book::inrandomorder()->where('id','!=',$id)->where('status',1)->take(3)->get();
        return view('frontend.book.details',['book'=>$book,'ReletedBooks'=>$ReletedBooks]);

    }
}
