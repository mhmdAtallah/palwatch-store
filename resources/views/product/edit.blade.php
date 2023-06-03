@extends('layouts/app')

@section('content')
    <form class="col-11  col-md-8 col-lg-6  p-4  mx-auto mt-5 border border-2 border-primary rounded bg-light" action="/product/update/{{ $product->id }}" method="post">
        @csrf
        <h1 class="text-center mb-3">Edit Product Info</h1>
        <div class="mb-3">
            <label class="label"   for="title">Title  </label>
            <input class="form-control" type="text" name="title" id="title" value="{{ $product->title }}" required
                value="{{ old('title') }}">
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label class="label" for="price">Price  </label>
            <input class="form-control" type="number" name="price" id="price" step="0.01"
                value={{ $product->price }} required value="{{ old('price') }}">
            @error('price')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="label" for="quantity">Quantity  </label>
            <input class="form-control" type="number" name="quantity" id="quantity" value={{ $product->quantity }} required
                value="{{ old('quantity') }}">
            @error('quantity')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label class="label" for="description">Description  </label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{ old('description') ?? $product->description }}</textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-end">
            <a   class="btn btn-warning mx-2" href={{ url()->previous() }}>Cancel</a>
            <button type="submit" class="btn btn-success" id="save-btn">Save</button>

        </div>
    </form>
@endsection
