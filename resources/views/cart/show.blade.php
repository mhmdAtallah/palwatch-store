@extends('layouts/app')

@section('content')

<div class="container-lg">
    <h1 class="text-center py-5">Your Cart</h1>
    <div class="p-2 rounded bg-light">
        <table class="table  table-striped " style="background-color: whitesmoke;">
            <thead>
                <tr>
                    <th scope="col-1"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>


                </tr>
            </thead>
            <tbody>


          @foreach ($carts as $cart)

          <tr>

            <td class=" col-2 ps-5  ">  <a   href="/product/{{ $cart->product_id }}"><img src="{{asset( 'storage/' . $cart->product->images->first()->path) }}" width="120" alt="img">    </a></td>
            <td class="col">{{ $cart->product->title }}</td>
            <td class="col">{{ $cart->quantity }}</td>
            <td class="col">{{ $cart->product->price }}$</td>
            <td class="col">{{ $cart->product->price *$cart->quantity}}$</td>
            <th scope="col">
                <form class="cart-form" action="cart/destroy/{{ $cart->id }}" method="post">
                    @csrf
                <button class="btn btn-danger badge">X</button>
                </form>
            </th>

        </tr>


          @endforeach





            </tbody>
        </table>
        <a  href="payment" class="btn btn-secondary fs-5 fw-bold float-end me-2 " type="submit">Do Payment</a>
        <br>
        <br>
    </div>
</div>
@endsection

