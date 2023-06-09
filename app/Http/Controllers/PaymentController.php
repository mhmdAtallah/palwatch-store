<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
       $total =  DB::table('carts')->where('user_id' , $user->id)->sum('total');
        return view('payment.create' , compact('user' , 'total'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $total = 0 ;
        $ids =  [] ;
        foreach ($user->cart as $cart) {
            $total += $cart->total ;
            array_push($ids , $cart->id);
            Cart::destroy($cart->id);

        }

        $payment = Payment::create([
            "total"=>$total ,
            "user_id"=>$user->id  ,
            "location"=>$request->location ,
            "phone"=>$request->phone ,
        ]);

        session()->push('total',$total);
        return redirect("/stripe");
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
