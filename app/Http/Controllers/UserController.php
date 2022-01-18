<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){

        return view('home.login',['title'=>'User Login','page'=>'login']);
    }


    public function auth(Request $req){

        $credential = $req->validate([

            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($credential)){

            $req->session()->regenerate();
            return redirect()->intended('/');
        };

        return back()->with('login_error','Invalid Username or Password');
    }
    public function register(){
        
        return view('home.register',['title'=>'User Register','page'=>'signup']);
    }
    
    public function register_store(Request $req){
        
        $validated = $req->validate([
            'name'=>'required|min:4|max:255',
            'username'=>'required|min:5|max:255|unique:users',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if(User::create($validated)){
            return redirect('/user-login')->with('success','User added successfully!');
        };
    }

    public function home( Request $req){

        // return $req->session()->all();
        return view('home.home',['title'=>'User Management','page'=>'home','data'=>User::all()]);
        
    }

    public function user_logout(){

  
        Auth::logout();

        request()->session()->invalidate();
        
        request()->session()->regenerateToken();

        return redirect('/user-login');
        
    }

    public function remove(User $user){

        $findUser = User::find($user->id);

        if($findUser->delete()){

            return redirect('/')->with('success','User has been deleted');
        }
    }
    public function update(User $user){

        return view('home.update',[
            'data'=>$user,
            'title'=>'Update'
        ]);
    }
    public function update_store(Request $req){

        $updated = User::where('id',$req->id);

        $updated->update([
            'username'=>$req->username,
            'name'=>$req->name,
            'email'=>$req->email
        ]);

        return redirect('/')->with('success','user has been updated');
  
    }
}
