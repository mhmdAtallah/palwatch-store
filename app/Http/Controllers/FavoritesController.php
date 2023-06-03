<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{

    public function index(){
        $favs = Favorites::where("user_id", auth()->user()->id)->paginate(8);
        return view('fav' , compact('favs'));
    }

    public function store(Request $req){
        Favorites::create(['product_id'=>$req->product_id , "user_id"=>auth()->user()->id]);
        session()->flash("success" , "Product added to favorite");
        return redirect()->back();

    }

    public function destroy( $id){
        $fav = Favorites::find($id);
        $fav->delete();
        session()->flash("success" , "Product removed from favorite");

        return redirect()->back();

    }
}
