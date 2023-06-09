@extends('layouts\app')


@section('content')
    <div class=" p-1 p-lg-4 mt-3">

        <div class=" row ">
            <h1 class="text-dark fs-1 fw-bold  col-12  col-md-3 col-lg-4">Products </h1>
            <form action="#" method="GET" class="d-flex me-5  col-md-3  col-12 col-lg-4">
                <input class="form-control form-control-sm me-2 bg-light" style="font-size:1.2rem"
                    value="{{ request('search') }}" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success " type="submit"><i class="bi bi bi-search"></i></button>


            </form>

            <div class="col-12 col-md-3 col-lg-3">
                @can('admin')
                    <a class="mb-4 btn btn-link btn-primary border border-3 border-dark rounded bg-secondary  fs-5 text-dark  text-decoration-none "
                        href="/products/create">New Product</a>
                @endcan

            </div>


        </div>

        <div class="d-flex justify-content-between">
            <form action="/products" method="GET" id="brand-form" style="width: 19%">

                <div class="col">
                    <div class="brand row">
                        <h3 class=" border-bottom border-info  w-75">Brands</h3>


                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="EMPORIO ARMANI" id="EMPORIO"
                                name="EMPORIO" onclick="brandSelect(event)" @checked(request('EMPORIO'))>
                            <label class="form-check-label" for="EMPORIO">
                                EMPORIO ARMANI
                            </label>
                        </div>

                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="BURBERRY" id="BURBERRY" name="BURBERRY"
                                onclick="brandSelect(event)" @checked(request('BURBERRY'))>
                            <label class="form-check-label " for="BURBERRY">
                                BURBERRY
                            </label>
                        </div>

                        <div class="mb-2 ">
                            <input class="form-check-input" type="checkbox" value="HUGO BOSS" id="BOSS" name="BOSS"
                                onclick="brandSelect(event)" @checked(request('BOSS'))>
                            <label class="form-check-label " for="BOSS">
                                HUGO BOSS
                            </label>
                        </div>

                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="MARC JACOBS" id="JACOBS"
                                name="JACOBS" onclick="brandSelect(event)" @checked(request('JACOBS'))>
                            <label class="form-check-label " for="JACOBS">
                                MARC JACOBS
                            </label>
                        </div>

                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="VERSACE" id="VERSACE" name="VERSACE"
                                onclick="brandSelect(event)" @checked(request('VERSACE'))>
                            <label class="form-check-label " for="VERSACE">
                                VERSACE
                            </label>
                        </div>

                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="DIESEL" id="DIESEL" name="DIESEL"
                                onclick="brandSelect(event)" @checked(request('DIESEL'))>
                            <label class="form-check-label " for="DIESEL">
                                DIESEL
                            </label>
                        </div>

                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="TISSOT" id="TISSOT" name="TISSOT"
                                onclick="brandSelect(event)" @checked(request('TISSOT'))>
                            <label class="form-check-label " for="TISSOT">
                                TISSOT
                            </label>
                        </div>

                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="FOSSIL" id="FOSSIL" name="FOSSIL"
                                onclick="brandSelect(event)" @checked(request('FOSSIL'))>
                            <label class="form-check-label " for="FOSSIL">
                                FOSSIL
                            </label>
                        </div>

                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="ROLEX" id="ROLEX"
                                name="ROLEX" onclick="brandSelect(event)" @checked(request('ROLEX'))>
                            <label class="form-check-label " for="ROLEX">
                                ROLEX
                            </label>
                        </div>

                        <div class="mb-2">
                            <input class="form-check-input" type="checkbox" value="UNISEX LOTUS" id="UNISEX"
                                name="UNISEX" onclick="brandSelect(event)" @checked(request('UNISEX'))>
                            <label class="form-check-label " for="UNISEX">
                                UNISEX LOTUS
                            </label>
                        </div>



                    </div>
                    <div class="price row mt-3">
                        <h3 class=" border-bottom border-info  w-75  mb-3">Price</h3>
                        <input  type="range" class="form-range  w-75" min="100" max="3000" step="100"
                            value="{{ request('price') ?? '0' }}" id="price" name="price"
                            onchange="priceSelect(event)">

                        <span id="value">Price : {{ request('price') ?? '0' }}$</span>
                    </div>
                </div>
            </form>

            <div class="row " style="width: 80%">
                @foreach ($products as $product)
                    @if ($product && $product->images()->count())
                        <a class="d-block col-11 col-md-4 col-lg-4  mb-3 text-decoration-none text-dark"
                            href="/product/{{ $product->id }}" class="d-block">
                            <div class="card bg-light" style="width: 90%;">
                                <img src="{{ asset('storage/' .$product->images()->get()->first()->path) ?? 'default.png' }}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="product-card-name">{{ $product->title }} </h4>
                                    <br>
                                    <h4 class="product-card-price">{{ $product->price }}$ </h4>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>



    </div>
    <div class="col-12 d-flex justify-content-center "> {{ $products->links() }}</div>
    </div>
@endsection

<style>
    .page-link {
        font-weight: bolder !important;
        font-size: 1.3rem !important;
    }

    ul.pagination {
        width: 50% !important;
    }

    .form-check-label:hover {
        text-decoration: underline;
    }
</style>

<script>
    const input = document.getElementById("price");
    const value = document.getElementById("value");

    function priceSelect(ev) {
        document.getElementById("brand-form").submit();
    }

    function brandSelect(ev) {
        document.getElementById("brand-form").submit();
    }
</script>
