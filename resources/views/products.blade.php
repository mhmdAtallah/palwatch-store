@extends('layouts\app')


@section('content')
    <div class=" p-5 mt-3">

        <div class=" row ">
            <h1 class="text-dark fs-1 fw-bold  col-12  col-md-3 col-lg-4">Products </h1>
            <form action="#" method="GET" class="d-flex me-5  col-md-3  col-12 col-lg-4">
                <input class="form-control form-control-sm me-2 bg-light" style="font-size:1.2rem"
                    value="{{ request('search') }}" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success " type="submit"><i class="bi bi bi-search"></i></button>


            </form>

            <div class="col-12 col-md-3 col-lg-3">
                @can('admin')
                    <a class="btn btn-link btn-primary border border-3 border-dark rounded bg-secondary  fs-5 text-dark  text-decoration-none "
                        href="/products/create">New Product</a>
                @endcan

            </div>


        </div>


        <div class="row p-5">
            @foreach ($products as $product)
                @if ($product && $product->images()->count())
                    <a class="d-block col-9 col-md-4 col-lg-3   mb-3 text-decoration-none text-dark"
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
</style>
