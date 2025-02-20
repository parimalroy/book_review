<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    // register page method

    public function register_index() {
        return view('backend.account.register');
    }

    //register user method
    public function register_store(Request $request) {
       $request->validate([
            'name'     =>'required|min:3',
            'email'    =>'required|email|unique:users',
            'password' =>'required_with:password_confirmation|same:password_confirmation|min:5',
            'password_confirmation'=>'min:5'
            
        ]);

        $users=User::create([
            'name'     =>$request->name,
            'email'    =>$request->email,
            'password' =>Hash::make($request->password)
        ]);

        if ($users) {
            return redirect()->route('login.index')->with('success', 'Register Sucessfully');
        } else {
            return redirect()->route('register.index')->with('error', 'Register faild!');
         }
    }

    //login page method

    public function login_index(){
        return view('backend.account.login');
    }
    //check user login
    public function login_store(Request $request){
        $request->validate([
            'email'    =>'required|email',
            'password' =>'required',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('profile.index');
            }else{
                return redirect()->route('login.index')->with('error','credientail not match');
            }
            
    }

    //prifile page method
    public function profile_index(){
        $user=User::find(Auth::user()->id);
        return view('backend.account.profile',['user'=>$user]);
    }

    //profile page logout
    public function profile_logout(){
        Auth::logout();
        return redirect()->route('login.index');
    }

    //profile update method

    public function profile_update(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'photo'=>'required|mimes:jpg,png,jpeg|max:3000',
        ]);

        
        $updateUser=User::find(Auth::user()->id);
        // ->update([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        // ]);
        $storeImage=public_path('storage/').$updateUser->photo;
        if(file_exists($storeImage)){
            @unlink($storeImage);
        }
        if($request->hasFile('photo')){
            $path=$request->photo->store('image','public');
            $updateUser->photo=$path;
            $updateUser->save();
        }
        $updateUser->name=$request->name;
        $updateUser->email=$request->email;
        $updateUser->save();
          
        if($updateUser){
            return redirect()->route('profile.index')->with('success','profile update success!');
        }
    }


   

}