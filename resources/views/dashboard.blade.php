@extends('layouts/app')
@section('content')
    <div class="">
        <div class="row my-3 w-75 mx-auto container">
            <!-- Widget Type 1-->
            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-red">{{ $users->count() }}</h4>
                                <p class="subtitle text-sm text-muted mb-0">Customers</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-red">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#speed-1"> </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-red-light">
                        <div class="row align-items-center text-red">
                            <div class="col-10">
                                <button id="customers-toggle" class=" toggles mb-0 btn btn-link fs-4"
                                    data-bs-toggle="collapse" href="#customers" role="button" aria-expanded="false"
                                    aria-controls="customers">Show All</button>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-blue">{{ $productsInStock->count() }}</h4>
                                <p class="subtitle text-sm text-muted mb-0">Product In Stock</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-blue">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#news-1"> </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-blue-light">
                        <div class="row align-items-center text-blue">
                            <div class="col-10">
                                <button class="toggles mb-0 btn btn-link fs-4" id="products-toggle"
                                    data-bs-toggle="collapse" href="#products" role="button" aria-expanded="false"
                                    aria-controls="products">Show All</button>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-primary">{{ $soldOutProducts->count() }}</h4>
                                <p class="subtitle text-sm text-muted mb-0">Sold out products</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-primary">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#bookmark-1"> </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-primary-light">
                        <div class="row align-items-center text-primary">
                            <div class="col-10">
                                <button class="toggles mb-0 btn btn-link fs-4" id="soldout-toggle" data-bs-toggle="collapse"
                                    href="#soldout" role="button" aria-expanded="false" aria-controls="soldout">Show
                                    All</button>

                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-green">{{ $payments->count() }}</h4>
                                <p class="subtitle text-sm text-muted mb-0">Purchases </p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-green">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#world-map-1"> </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-green-light">
                        <div class="row align-items-center text-green">
                            <div class="col-10">
                                <button class="toggles mb-0 btn btn-link fs-4" id="payments-toggle" data-bs-toggle="collapse"
                                href="#payments" role="button" aria-expanded="false" aria-controls="payments">Show
                                All</button>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="collapse  w-75 mx-auto container m-1" id="customers">
            <div class="card card-body   ">
                <h1 class="text-center my-3">Customers</h1>
                <table class="table table-striped text-center ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col"># Of Payments</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td><span class="btn btn-link fs-5" data-bs-toggle="modal"
                                        data-bs-target="#user-card{{ $user->id }}">{{ $user->name }}</span></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->payments->count() }}</td>


                            </tr>

                            <div class="modal fade" id="user-card{{ $user->id }}" tabindex="-1"
                                aria-labelledby="user-cardLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-primary" id="user-cardLabel"><i
                                                    class="bi bi-person-badge-fill"></i>{{ $user->name }}</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body p-4">
                                                <h6>Information</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Email</h6>
                                                        <p class="text-muted"> {{ $user->email }}</p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Phone</h6>
                                                        <p class="text-muted">{{ $user->phone }}</p>
                                                    </div>
                                                </div>
                                                <h6>Location</h6>
                                                <hr class="mt-0 mb-4">
                                                <div>
                                                    <p>{{ $user->location }} </p>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        <div class="collapse  w-75 mx-auto container m-1" id="soldout">
            <div class="card card-body   ">
                  <h1 class="text-center my-3">Sold out Products</h1>
                <table class="table table-striped text-center ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($soldOutProducts as $product)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td><a  class="btn btn-link" href="product/{{ $product->id }}"> {{ $product->title }}</a> </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="collapse  w-75 mx-auto container m-1" id="products">
            <div class="card card-body   ">
                <h1 class="text-center my-3">Products In Stock</h1>

                <table class="table table-striped text-center ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsInStock as $product)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td><a href="product/{{ $product->id }}"> {{ $product->title }}</a> </td>
                                <td>{{ $product->price }}$</td>
                                <td>{{ $product->quantity }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        <div class="collapse  w-75 mx-auto container m-1" id="payments">
            <div class="card card-body   ">
                <h1 class="text-center my-3">Purchases</h1>

                <table class="table table-striped text-center ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>  <span class="btn btn-link fs-5" data-bs-toggle="modal"
                                    data-bs-target="#payment-card{{ $payment->user->id }}">{{ $payment->user->name }}</span></td>
                                <td>{{ $payment->total }}$</td>
                                <td class="col-4">{{ $payment->location }}</td>

                            </tr>

                             <div class="modal fade" id="payment-card{{ $payment->user->id }}" tabindex="-1"
                                aria-labelledby="user-cardLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-primary" id="user-cardLabel"><i
                                                    class="bi bi-person-badge-fill"></i>{{ $payment->user->name }}</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body p-4">
                                                <h6>Information</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Email</h6>
                                                        <p class="text-muted"> {{ $payment->user->email }}</p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Phone</h6>
                                                        <p class="text-muted">{{ $payment->user->phone }}</p>
                                                    </div>
                                                </div>
                                                <h6>Location</h6>
                                                <hr class="mt-0 mb-4">
                                                <div>
                                                    <p>{{ $payment->location }} </p>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <br>


    </div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(e) {
        addEventListener("load", (event) => {
            document.getElementById('customers-toggle').click();

        });

        $('.collapse').on('show.bs.collapse', function() {
            // Hide other open collapse elements
            $('.collapse').not($(this)).collapse('hide');
        });

        $('#customers-toggle').click(function() {
      toggleButtonText($(this));
    });

    $('#products-toggle').click(function() {
      toggleButtonText($(this));
    });

    $('#soldout-toggle').click(function() {
      toggleButtonText($(this));
    });

    $('#payments-toggle').click(function() {
      toggleButtonText($(this));
    });

    function toggleButtonText(button) {
      const buttonText = button.text();

      if (buttonText === 'Show All') {
        button.text('Hide');
        $('.toggles').not(button).text('Show All');
      } else {
        button.text('Show All');
      }
    }

    });
</script>
