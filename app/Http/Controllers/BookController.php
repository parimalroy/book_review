<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //book list show method
    public function index(Request $request){
        $books =Book::orderBy('id','DESC');
        if(!empty($request->keyword)){
            $books->where('title','like','%'.$request->keyword.'%');
        }
        $books=$books->paginate(8);
        return view('backend.book.index',['books'=>$books]);
    }


    //book create method
    public function create(){
        return view('backend.book.create');
    }


    //book add method
    public function store(Request $request){
        $request->validate([
            'title'=>'required|min:3|max:255',
            'author'=>'required|min:3|max:255',
            'photo'=>'required|mimes:jpg,png,jpeg|max:3000',
        ]);


        $path=$request->photo->store('image','public');

       $books= Book::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'description'=>$request->description,
            'photo'=>$path,
            'status'=>$request->status,
            'created_at'=>time(),
            'updated_at'=>time(),
        ]);

        if($books){
            return redirect()->route('book.create')->with('success','book added successfully');
        }

    }
    //book edit method
    public function edit($id){
        $book=Book::findOrFail($id);
        return view('backend.book.edit',['book'=>$book]);

    }
    //book update method
    public function update(Request $request, $id){
        $book =Book::find($id);
     
        $request->validate([
            'title'=>'required|min:3|max:255',
            'author'=>'required|min:3|max:255',
            // 'photo'=>'required|mimes:jpg,png,jpeg|max:3000',
        ]);

        $book->title=$request->title;
        $book->author=$request->author;
        $book->description=$request->description;
        $book->status=$request->status;
        $book->save();

        if(!empty($request->photo)){
            $storagePhoto= public_path('storage/').$book->photo;
            if(file_exists($storagePhoto)){
                @unlink($storagePhoto);
            }
            
            if($request->hasFile('photo')){
                $path=$request->photo->store('image','public');
                $book->photo=$path;
                $book->save();

            }
        }
        if($book){
            return redirect()->route('book.index')->with('success','book update successfully');

        }

    }

    //book destory method
    public function trash(Request $request){
        $trashBook = Book::find($request->id)->delete();
        return redirect()->route('book.index')->with('success','book Deleted successfully');

    }
}
