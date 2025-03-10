<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //this method show book list home page
    public function index(Request $request){
        $books=Book::inrandomorder()->withCount('reviews')->withSum('reviews','rating')->where('status',1);
       
        if(!empty($request->keyword)){
            $books=Book::where('title','like','%'.$request->keyword.'%');
        }
        $books=$books->paginate(8);
        // dd($books);
        return view('frontend.book.home',['books'=>$books]);

    }


    // this method show book details
    public function details($id){
        $book =Book::with(['reviews.user','reviews'=>function($query){
            $query->where('status',1);
        }])->withCount('reviews')->withSum('reviews','rating')->findOrFail($id);
        // dd($book);
        $ReletedBooks =Book::inrandomorder()->withCount('reviews')->withSum('reviews','rating')->where('id','!=',$id)->where('status',1)->take(3)->get();
        return view('frontend.book.details',['book'=>$book,'ReletedBooks'=>$ReletedBooks]);

    }


    //this function store book review

    public function review_store(Request $request){

    $validate=Validator::make($request->all(),
             [
                'review'=>'required|min:5',
                'rating'=>'required',
            ]);
        
        if($validate->fails()){
            return redirect()->route('book.details',$request->book_id)->with('error','Revie Not Added please add Review and Rating');

        }


        // Review Count 
        $reviewCount=Review::where('user_id',Auth::user()->id)->where('book_id',$request->book_id)->count();
        if($reviewCount>0){
            return redirect()->route('book.details',$request->book_id)->with('error','You already submited review for this book');
        }


        $bookReview=Review::create([
            'review'=>$request->review,
            'rating'=>$request->rating,
            'user_id'=>Auth::user()->id,
            'book_id'=>$request->book_id
        ]);
        
        if($bookReview){
            return redirect()->route('book.details',$request->book_id)->with('success','Review add success. please wait for admin aprove');

        }

    

    }
}
