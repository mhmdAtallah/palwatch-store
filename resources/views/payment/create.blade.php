@extends('layouts\app')

@section('content')

    <h1 class="text-center fw-bolder pt-4 mt-4">Order Confirmation</h1>

    <form action="payment" method="POST" class="col-11  col-md-8 col-lg-6 p-4 mx-auto fs-4  mt-5  border border-2 border-primary rounded bg-light" >
        @csrf
        <div class="mb-5 ">
            <label class="" for="phone">Phone</label>
            <input type="tel" class="form-control fs-5 " id="phone" name="phone" value="{{$user->phone?? ""}}">
        </div>
        <div class="mb-5 ">
            <label class="" for="location">Location</label>
            <textarea name="location" id="location" class="form-control fs-5 " rows="10">
            {{$user->location?? ""}}
        </textarea>
        </div>

            <div class="d-flex justify-content-between align-items-center">
                <h5 class="">Total price of {{$user->cart()->count()}} orders : {{$total}}$</h5>
            <button class="btn btn-success fs-5   ">Confirm Order</button>
            </div>

    </form>
<br><br>

    @endsection



