<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Payment;

use PhpParser\Node\Scalar\MagicConst\Function_;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('isAdmin' ,  "=" , false)->get();;
        $productsInStock = Product::where('quantity' ,  ">" ,0)->get();
        $soldOutProducts = Product::where('quantity' ,  "=" , 0)->get();

        $payments = Payment::all();
        return view("dashboard", compact('users' , 'productsInStock' ,"soldOutProducts" ,  "payments"));
    }
}
