<head>
    <link rel="stylesheet" href="./style.css">
</head>

@extends('layouts/app')
@section('content')
    <section class="info-wrap h-100" style="background-image: url({{ asset('imgs/contact.png') }});  overflow-y: scroll">



        <h1 class=" text-primary mb-5   fw-bold text-center" style="font-size: 4rem;  text-shadow: 1px 1px 2px rgb(226, 222, 222);">Contact Us</h1>


        <div class="row justify-content-center pt-5">



            <form method="POST" id="contactForm" name="contactForm" class="   row container  col-12 col-md-6" action="email">
                @csrf

                <div class="col-md-6">
                    <div class="form-floating mb-3">

                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        <label class="label" for="name">Full Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        <label class="label" for="email">Email Address</label>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                        <label class="label" for="subject">Subject</label>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                        <label class="label" for="#">Message</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="submit" value="Send Message" class="btn btn-primary  fs-3"
                            onclick="alert(`Your message has sent `)">

                    </div>
                </div>

            </form>

            <div class="text-center text-md-start text-secondary col-12 col-md-6" style=" text-shadow: 1px 1px 2px black">

                <div class=" row   mb-3  ">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-map-marker"></span>
                    </div>
                    <div class="text-seconary">
                        <p><i class="bi bi-geo-fill" style="font-size: 1.6rem"></i> <span>Address</span>
                            {{ $user->location }}
                        </p>
                    </div>
                </div>

                <div class=" row  mb-3 ">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-phone"></span>
                    </div>
                    <div class="text-seconary">
                        <p><i class="bi bi-telephone" style="font-size: 1.5rem"></i><span> Phone</span>
                            <a  class="ahref" href="tel://1234567920">+972 59-508-4839</a>
                        </p>
                    </div>

                </div>

                <div class=" row   mb-3">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-paper-plane"></span>
                    </div>
                    <div class="text-seconary">
                        <p><i class="bi bi-envelope-fill" style="font-size: 1.5rem"></i><span> Email </span>
                            <a class="ahref"  href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </p>
                    </div>

                </div>

                <div class=" row   mb-3">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-globe"></span>
                    </div>
                    <div class="text-seconary">
                        <p><i class="bi bi-facebook" style="font-size: 1.6rem; color:#4267B2"></i><span>
                                Facebook</span>
                            <a class="ahref"  target="_blank" href="https://www.facebook.com/mohammad.atalla.50">WatchStore.facebook</a>
                        </p>

                    </div>
                </div>



<br>
<br>
<br>

            </div>
        </div>
    </section>
@endsection

<style>
    .info-wrap {
        background-repeat: no-repeat;
        width: 100%;
        background-position: center;
        background-size: cover;
        padding-top: 5rem;
        position: fixed;
    }

    .ahref:hover{
        color: #7b8db1;
        text-shadow: 1px 1px 2px rgb(192, 185, 185);
     }

</style>
