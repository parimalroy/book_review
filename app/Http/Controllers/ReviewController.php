<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    
    //this method show review list

    public function index(Request $request){
        $reviews=Review::with('book','user')->orderBy('id','DESC');
        if(!empty($request->keyword)){
            $reviews=Review::where('review','like','%'.$request->keyword.'%');
        }
        $reviews=$reviews->paginate(10);
        return view('backend.review.index',['reviews'=>$reviews]);
    }


    //this method edit review and status

    public function edit($id){
        $review =Review::findOrFail($id);
        return view('backend.review.edit',['review'=>$review]);
    }

    //this method update Review and status

    public function update(Request $request,$id){
        // $validate=Validator::make($request->all(),[
        //     'review'=>'required',
        //     // 'status'=>'required'
        // ]);

        // if($validate->fails()){
        //     return redirect()->route('review.edit',$request->id)->with('error','Review update fail!');
        // }

        $request->validate([
            'review'=>'required'
        ]);

        $update =Review::find($id)->update([
            'review'=>$request->review,
            'status'=>$request->status
        ]);

        if($update){
            return redirect()->route('review.edit',$request->id)->with('success','review updated success!');
        }
    }

    //this mehthd delete review for admin dashboard

    public function delete(Request $request){
        $deleteReview= Review::find($request->id)->delete();
        
        if($deleteReview){
            return redirect()->route('review.index',$request->id)->with('success','review deleted success!');
        }
    }



    //this method  show user review
    public function userReviewIndex(Request $request){
        $userReviews=Review::with('book')->where('user_id',Auth::user()->id)
        ->orderBy('id','DESC');
        if(!empty($request->keyword)){
            $userReviews=Review::where('review','like','%'.$request->keyword.'%');
        }
        $userReviews=$userReviews->paginate(10);
        
        return view('backend.user-review.index',['userReviews'=>$userReviews]);
    }

    //this method show user edit
    public function userReviewEdit($id){
        $userReview=Review::with('book')->where(['id'=>$id,'user_id'=>Auth::user()->id])->first();
        
        return view('backend.user-review.edit',['userReview'=>$userReview]);
    }
    
    // this method update user review

    public function userReviewUpdate(Request $request,$id){
        // $validate=Validator::make($request->all(),[
        //     'review'=>'required',
        //     // 'rating'=>'required'
        // ]);

        // if($validate->fails()){
        //     return redirect()->route('userReview.edit',$request->id)->with('error','review update fail');
        // }

        $request->validate([
            'review'=>'required'
        ]);

        $updateReview=Review::find($id)->update([
            'review'=>$request->review,
            'rating'=>$request->rating
        ]);
        if($updateReview){
            return redirect()->route('userReview.edit',$request->id)->with('success','review updated');
        }

    }

}
