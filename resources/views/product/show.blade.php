 @extends('layouts/app')

 @section('content')
     <a class=" btn btn-outline-secondary  fs-2  float-end   m-3 text-primary  " href="/products"> <i
             class="bi bi-arrow-left"></i> </a>
     <br>
     <br>
     <br>



     <div contai class="row mx-auto" style="position: relative; width: 90%  ;   ">

         <div class="col-12  col-md-6 info    ">

             <h1 class="fw-bold fs-1  py-4">{{ $product->title }}</h1>
             <h2 class=" m-0  ">{{ $product->price }}$</h2>


             @can('admin')
                 <h3>Quantity : {{ $product->quantity }}</h3>
             @endcan


             <p class="p-3 fs-5 "> {{ $product->description }}
                 <hr>



                 @can('admin')
                 <div class="d-flex  m-5 w-75 justify-content-between ">

                     <form action="/product/destroy/{{ $product->id }}" method="post">
                         @csrf
                         <button class="btn  btn-danger " type="submit">Delete</button>
                     </form>

                     <form action="/product/update/{{ $product->id }}" method="get">
                         @csrf
                         <button class="btn btn-info text-white" type="submit">Edit</button>
                     </form>
                 </div>
             @endcan


             @can('customer')
                 <form class="" action="/cart" method="post">
                     @csrf

                     <input type="hidden" name="product_id" id="product_id" value={{ $product->id }}>
                     <input type="hidden" name="product_name" id="product_name" value="{{ $product->title }}">

                     <div class="d-flex p-2  align-items-center ">
                         <button class=" btn btn-primary badge   col-1  rounded-circle fs-6 fw-bold text-center py-3"
                             onclick="editCount(-1) " type="button" style="">-</button>
                         <input type="number" name="count" id="count" placeholder="count" value="1" min="1"
                             @disabled($product->quantity <= 0) class="form-control  col-1 text-center bg-white mx-1"
                             style="width:15% ">
                         <button class="btn btn-info badge   col-1 rounded-circle fs-6 fw-bold text-center py-3"
                             onclick="editCount(1)" type="button" style="">+</button>

                             <span class="ms-5 border border-2 border-info p-2 rounded"  >Total : <span id="total">{{$product->price}}</span>$</span>

                     </div>

                     <div class="d-flex align-items-center justify-content-start mt-4">

                         <button class="btn btn-dark" type="submit" @disabled($product->quantity <= 0)>add to cart </button>
                     </div>



                 </form>
                 <div class="d-flex align-items-center justify-content-start mt-4">
                    @if ($isFav)
                  <form action="/favorite/{{ $isFav->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-warning text-white " type="submit" >Remove from Favorite  <i class="bi bi-heart-half"></i> </button>
                  </form>

                    @else
                    <form action="/favorite" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" >
                        <button class="btn btn-info text-white " type="submit" >add to Favorite  <i class="bi bi-heart"></i> </button>
                      </form>
                    @endif
                </div>
                 @if (!$product->quantity)
                     <h3 style="text-decoration: line-through">SOLD OUT</h3>
                 @endif
             @endcan


         </div>
         <div class="col-12 col-md-5 img  d-flex  justify-content-center  ">
             <div class=" mb-5  h-50 img w-sm-100 w-md-75">
                 <div class="ombre-externe  ">
                     <div class="ombre-interne">
                         <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
                             <div class="carousel-inner ">
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $product->images[0]->path) }}"
                                        class="d-block w-100 peinture-ombre-interne-fine" alt="...">

                                </div>
                                 @foreach ($product->images as $image)
                                    @if(!$loop->first)
                                    <div class="carousel-item ">
                                        <img src="{{ asset('storage/' . $image->path) }}"
                                            class="d-block w-100 peinture-ombre-interne-fine" alt="...">

                                    </div>
                                    @endif
                                 @endforeach
                             </div>
                             <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                                 data-bs-slide="prev">
                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                 <span class="visually-hidden">Previous</span>
                             </button>
                             <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                                 data-bs-slide="next">
                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                 <span class="visually-hidden">Next</span>
                             </button>
                         </div>

                     </div>
                 </div>
             </div>


         </div>






     </div>




     <script>
         const count = document.getElementById('count')
        const total = document.getElementById('total');
         function editCount(value) {
             value = parseInt(count.value) + value
             count.value = value;
            total.textContent = value * {{$product->price}}
         }

     </script>
 @endsection


 <style>
    body {
        overflow: scroll !important;
    }
     .carousel-inner {
         height: 0;
         padding-bottom: 105%;

     }

     .carousel-item {
         position: absolute !important;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
     }

     .carousel-item img {
         height: 100%;
         object-fit: cover;
     }
     .ombre-externe {
        border:  solid gray  .3rem ;
        border-radius: 1rem;
        overflow: hidden;
     }

     .img {
         width: 65%;
         height: 100%;

     }

     body {
         overflow: hidden;
     }

     .info {

     }
 </style>
