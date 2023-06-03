<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function index()
    {
        return view('profile', ['user' => auth()->user()]);
    }


    public function update(Request $req, User $user)
    {

        try {
            $user->update(['username' => $req->username, "name" => $req->name, "email" => $req->email, "phone" => $req->phone, 'location' => $req->location]);
        } catch (\Throwable $th) {

            return redirect("/profile")->with('Profile updated successfully');
        }
        return redirect("/profile")->with('Profile updated successfully');

    }

    public function about() {
        $user = User::where('isAdmin' , true)->first();
        return view('about' , compact('user'));
    }

    public function contacts() {
        $user = User::where('isAdmin' , true)->first();

        return view('contact' , compact('user'));
    }

    public function email() {
        
        return view('home');
    }
}
