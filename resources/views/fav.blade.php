@extends('layouts\app')


@section('content')
    <div class=" p-5 mt-3">

            <h1 class="text-dark fs-1 fw-bold  col-12  text-center ">Favorites </h1>


        <div class="row p-5">
            @foreach ($favs as $fav)

                @if ($fav && $fav->product->images()->count())
                    <a class="d-block col-9 col-md-4 col-lg-3   mb-3 text-decoration-none text-dark"
                        href="/product/{{ $fav->prodcut_id }}" class="d-block">
                        <div class="card bg-light" style="width: 90%;">
                            <img src="{{ asset('storage/' .  $fav->product->images()->get()->first()->path) ?? 'default.png' }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="product-card-name">{{  $fav->product->title }} </h4>
                                <br>
                                <h4 class="product-card-price">{{   $fav->product->price }}$ </h4>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>




    </div>
    <div class="col-12 d-flex justify-content-center "> {{ $favs->links() }}</div>
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
