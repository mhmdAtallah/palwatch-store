@extends('layouts/app')

@section('content')
    <section class="  text-dark  ">
        <div class=" py-5 h-100 container ">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class="">
                    <div class="card mb-3  py-5 " style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center "
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                               @can('customer')
                               <img src="{{ asset('/imgs/customer-profile.png') }}" alt="Avatar" class="img-fluid my-4"
                               style="width: 50%;" />
                               @endcan

                               @can('admin')
                               <img src="{{ asset('/imgs/admin.png') }}" alt="Avatar" class="img-fluid my-4 ms-5"
                               style="width: 45%;" />
                               @endcan
                                <h5>{{ $user->name }}</h5>
                                <h5>&#64;{{ $user->username }}</h5>
                                <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#profilemodal">Edit
                                    Info<i class="bi bi-pencil-square "></i></button>

                            </div>
                            <div class="col-md-8">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- Modal -->
    <div class="modal fade" id="profilemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="profilemodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="profilemodalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body " style="background-color: #ebe6d8dc">

                    <form id="edit-form"  class="p-5" action="profile/{{ auth()->user()->id }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="{{ $user->name }}"
                                value="{{ old('name') ?? $user->name }}" />


                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input class="form-control" id="username" type="text" name="username" placeholder="{{ $user->username }}"
                                value="{{ old('username') ?? $user->username }}">
                            @error('username')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" placeholder="{{ $user->email }}"
                                value="{{ old('email') ?? $user->email }}">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input class="form-control" id="phone" type="tel" name="phone" placeholder="{{ $user->phone }}"
                                value="{{ old('phone') ?? $user->phone }}">
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="location">location</label>
                            <textarea class="form-control" id="location" type="text" name="location" rows="6" placeholder="{{ $user->location }}"> {{ old('location') ?? $user->location }} </textarea>
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>




                    </form>
                </div>
                <div class="modal-footer bg-white rounded" >
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('edit-form').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

