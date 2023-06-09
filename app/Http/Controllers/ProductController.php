<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Images;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $emporio = request('EMPORIO');
        $burberry = request('BURBERRY');
        $boss = request('BOSS');
        $jacobs = request('JACOBS');
        $versace = request('VERSACE');
        $diesel = request('DIESEL');
        $tissot = request('TISSOT');
        $fossil = request('FOSSIL');
        $rolex = request('ROLEX');
        $unisex = request('UNISEX');

        $products = Product::orderBy('created_at', 'DESC');
        $search = request('search');
        $price = request('price')?? 100000;


        if ($search) {
            $products = $products->where('title', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%");
        }

        if($emporio) {
            $products = $products->where('title', 'like', "%{$emporio}%");
        }
        if($burberry) {
            $products = $products->orWhere('title', 'like', "%{$burberry}%");
        }
        if($boss) {
            $products = $products->orWhere('title', 'like', "%{$boss}%");
        }
        if($jacobs) {
            $products = $products->orWhere('title', 'like', "%{$jacobs}%");
        }
        if($versace) {
            $products = $products->orWhere('title', 'like', "%{$versace}%");
        }
        if($diesel) {
            $products = $products->orWhere('title', 'like', "%{$diesel}%");
        }
        if($tissot) {
            $products = $products->orWhere('title', 'like', "%{$tissot}%");
        }
        if($fossil) {
            $products = $products->orWhere('title', 'like', "%{$fossil}%");
        }
        if($rolex) {
            $products = $products->orWhere('title', 'like', "%{$rolex}%");
        }
        if($unisex) {
            $products = $products->orWhere('title', 'like', "%{$unisex}%");
        }


        if ($price) {
            $products = $products->Where('price' , '<=' , $price);
        }

        return view('products', ['products' => $products->paginate(9)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('product.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {

        $credentials = $req->validate([
            "title" => ['required', 'min:3', 'max:254'],
            "price" => ['required'],
            "quantity" => ['required'],
            "description" => ['required', 'min:0'],
            "images" => [
                'required',
            ]
        ]);
        $product = Product::create([
            "title" => $req->title,
            "price" => $req->price,
            "quantity" => $req->quantity,
            "description" => $req->description,

        ]);

        foreach ($req->file("images") as $index=>$image) {
            $path =strtotime(now()). "$index." .$image->getClientOriginalExtension();
            $image->storeAs('public', $path);
            Images::create([
                "path" => $path,
                "product_id" => $product->id
            ]);

        }
        session()->flash("success" , "product Added successfully");
        return redirect('/products')->with('success', "product added successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $isFav =  Favorites::where('product_id' , $product->id)->first();

        return view('product.show', ['product' => Product::where('id', $product->id)->first() , "isFav"=>$isFav]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Product $product)
    {

        $credentials = $req->validate([
            "title" => ['required', 'min:3', 'max:254'],
            "price" => ['required'],
            "quantity" => [
                'required',
            ],
            "description" => ['required', 'min:0'],
        ]);

        $product->update($credentials);
        session()->flash("success" , "product updated successfully");
        return redirect("/product/" . $product->id)->with('success', "product updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash("success" , "product deleted successfully");

        return redirect('/products');
    }
}
