<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    //
    public function createUser(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required||unique:users', 
            'password' => 'required'
        ]);
        $name = $req->name;
        $email = $req->email;
        $password = Hash::make($req->password);

        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $password;
        $newUser->save();
        if($newUser){
            return redirect("/login");
        } else {
            return back() -> with("fail", "Unable to sign up");
        }
    }
    public function loginUser(Request $req) {
        $req->validate([
            'email' => 'required', 
            'password' => 'required'
        ]);
        $user = User::where('email', "=", $req->email)->first();
        if($user){
            if(Hash::check($req->password, $user->password)){
                return redirect("/");
            } else {
                return back()->with('fail', "password not matched");

            }
        } else {
            return back()->with('fail', "user not found");
        }
    }
}