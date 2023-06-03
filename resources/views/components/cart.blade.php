

@auth

@if ( auth()->user()->cart()->count())

<button type="button" class="btn btn-primary position-fixed bottom-0 end-0  m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="z-index: 9999">
  Cart   <span class="bg-danger text-white  px-2 py-1 rounded-circle">{{ auth()->user()->cart()->count() }}</span>
  </button>


  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">You Cart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>

                  </tr>
                </thead>
                <tbody>
                 @foreach (auth()->user()->cart as $item)
                 <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->total}}$</td>
                    <td>  <form  id="cart-s-fotm" class=""
                        action="/cart/destroy/{{ $item->id }}" method="POST">
                        @csrf
                        <button class="btn btn-danger badge" type="submit">Remove</button>
                    </form></td>
                  </tr>

                 @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <a  href="/payment" class="btn btn-secondary" type="submit">Do Payment</a>
        </div>
      </div>
    </div>
  </div>
@endif


@endauth

<style>


</style>




