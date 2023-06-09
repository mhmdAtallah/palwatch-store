@extends('layouts\app')

@section('content')
    <div class="main row ">
        <div class="col-12 col-sm-12 col-md-6  d-flex align-items-center justify-content-center h-100  ">
            <div class="ms-5 ">
                <h1 class="text-start text-dark   "> Select Your New Perfect Style</h1>
                <p  class="text-start text-dark   "> The fusion of refined aesthetics and functional
                    timekeeping creates a harmonious balance that captivates the discerning eye.</p>
                <a class="btn  btn-info text-white fw-bold" href="/products">Shop Now</a>
            </div>
        </div>
        <img id="home1" class=" d-none d-md-block   col-12 col-md-6 mx-auto heartbeat  "
            src="{{ asset('imgs/home1.png') }}" width="600" alt="">
    </div>

    <div>
        <div class="row">
            <div class="overflow-hidden  position-relative clo-12 col-lg-6  ">
                <div class=" back-img1 zoom-out">
                </div>
            </div>

            <div class="clo-12 col-lg-6 ">
                <div class="overflow-hidden position-relative">
                    <div class="back-img3 zoom-out" style="   background-image: : url({{ asset('imgs/admin.png') }});">
                    </div>
                </div>
                <div href="#" class="overflow-hidden position-relative">
                    <div class="back-img4 zoom-out">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="New-Arrivals container-lg ">
        @if ($products->count()>2)
        <div>
            <h2 class="h2-sec2">New Arrivals</h2>
        </div>
        <div class="container">
            <div class="row">

                <a class="col-12 col-md-4 zoom-ani text-decoration-none text-dark"  href="product/{{ $products[0]->id }}">
                    <img src="{{asset('storage/'. $products[0]->images()->first()->path )}}" class="sec2-img" alt="" title="">
                    <p class="sec2-para1">{{ $products[0]->title }}</p>
                    <p class="sec2-para2">$ {{ $products[0]->price }}</p>
                </a>

                <a class="col-12 col-md-4 zoom-ani text-decoration-none text-dark"  href="product/{{ $products[1]->id }}">
                    <img src="{{asset('storage/'. $products[1]->images()->first()->path )}}" class="sec2-img" alt="" title="">
                    <p class="sec2-para1">{{ $products[1]->title }}</p>
                    <p class="sec2-para2">$ {{ $products[1]->price }}</p>
                </a>

                <a class="col-12 col-md-4 zoom-ani text-decoration-none text-dark" href="product/{{ $products[2]->id }}">
                    <img  src="{{asset('storage/'. $products[2]->images()->first()->path )}}" class="sec2-img" alt="" title="">
                    <p class="sec2-para1">{{ $products[2]->title }}</p>
                    <p class="sec2-para2">$ {{ $products[2]->price }}</p>
                </a>
            </div>
        </div>
        @endif

        <h3 class="text-center"><a class="text-decoration-none btn fw-bold text-white mt-5 " href="/products" style="background-color: gray">View All Products</a></h3>

    </section>
<hr class="w-100">
    <footer class="w-100">
        <div class="container-lg ">
            <div class="row">
                <div class="col-12 col-md-4 text-center text-md-start  mb-5">
                    <a class="clock" href="#">Pal <span class="smith-header">Watch Store</span></a>
                    <br>
                    <h5>{{ $user->phone }}</h5>

                    <a href="#" class=" text-decoration-none">
                        {{ $user->location }}
                    </a>
                </div>
                <div class="col-12 col-md-4 text-center text-md-start  my-5">
                    <h4 class="footer-title">Quick Links</h4>
                    <a href="/about" class="footer-item">About</a>

                    <a href="/contact" class="footer-item">Contact Us</a>
                </div>
                <div class="col-12 col-md-4 text-center text-md-start  my-5">
                    @if ($products->count()>3)
                     <h4 class="footer-title"> New Products</h4>

                   <a  href="product/{{ $products[0]->id }}" class="footer-item">{{ $products[0]->title}}</a>

                    <a  href="product/{{ $products[1]->id }}" class="footer-item">{{ $products[1]->title}}</a>
                    <a  href="product/{{ $products[2]->id }}" class="footer-item"> {{ $products[2]->title }}s</a>
                    <a  href="product/{{ $products[3]->id }}" class="footer-item"> {{ $products[3]->title }}</a>
                    @endif

                </div>

                <h1 class="text-center" > <a href="whatsapp://send?phone=+972595084839" style="color:green"><i class="bi bi-whatsapp"></i></a></h1>
               

            </div>
        </div>
            <hr class="footer-item footer-line">
            <div class="copyright">Copyright ©2023 All rights reserved </div>
        </footer>


@endsection

<style>

footer
{

    padding-top: 50px;
    padding-bottom: 100px;
    margin-top: 30px;
}
.clock
{
    font-size: 24px;
    color: var(--color-black);
    font-weight: bold;
}
.clock:hover
{
    color: var(--gray-color);
}
.footer-para
{
    margin-top:20px ;
    color: var(--gray-color);
    display: block;
    font-size: 16px;
    font-weight: bold;
    width: 70%;
}


.footer-para:hover
{
    color: var(--light-gray-color);
}
.footer-title
{
    font-weight: 400;
    color: var(--color-black);
}
.footer-item
{
    font-size: 16px;
    font-family: var(--font-header);
    color: var(--gray-color);
    display: block;
    margin-top: 20px;
    transition: all .5s;
}
.footer-item:hover
{
    color: var(--main-color);
    transform: translateX(3%);
}
.copyright
{
    margin-top: 50px;
text-align: center;
    font-size: 16px;
    font-family: var(--font-header);
    color: var(--gray-color);
    display: block;
    transition: all .5s;
}
.footer-line
{
    margin-top: 50px;
}


.New-Arrivals
{
    margin-top: 200px;
}
.h2-sec2
{
    font-family: var(--font-family-monospace);
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 60px;
    color: var(--color-black);
}
.sec2-para1
{
    text-align: center;
    font-size: 24px;
    color: var(--light-gray-color);
    font-family: var(--font-header);
    font-weight: bold;
    margin-top: 25px;
}
.sec2-para2
{
    text-align: center;
    font-size: 18px;
    color: var(--main-color);
    font-family: var(--font-header);

}
.sec2-img
{
    width: 100%;
    transition: all .8s;

}
.zoom-ani:hover .sec2-img
{

    transform: scale(.9,.9);
}

    body {
        margin: 0;

    }

    #home1 {

        width: 300px;
    }

    .main {
        background-color: rgb(207, 207, 207);
        height: 85vh;
    }

    h1 {
        font-size: 25rem;

    }

    .back-img1 {
        background-image: url({{ asset('imgs/gallery1.png') }});
        background-repeat: no-repeat;
        position: relative;
        height: 100vh;
        background-size: 150%;
        box-sizing: border-box;
        transform: scale(1.1, 1.1);
        width: 100%;

    }

    .back-img2 {

        background-repeat: no-repeat;
        position: relative;
        background-size: 100%;
        box-sizing: border-box;
        transform: scale(1.1, 1.1);
        width: 50%;

    }

    .back-img3 {
        height: 51vh;
        background-repeat: no-repeat;
        position: relative;
        background-size: 100%;

        box-sizing: border-box;
        transform: scale(1.1, 1.1);
        width: 100%;
        background-position: center;
        background-image: url({{ asset('imgs/gallery3.png') }});

    }

    .back-img4 {
        height: 50vh;
        background-image: url({{ asset('imgs/gallery4.png') }});
        background-repeat: no-repeat;
        position: relative;
        background-position: center;

        background-size: 100%;
        box-sizing: border-box;
        transform: scale(1.1, 1.1);
        width: 100%;
    }

    .zoom-out {
        transition: all .8s;
        box-sizing: border-box;
    }

    .zoom-out:hover {
        transform: scale(1.2, 1.2);
    }

    .heartbeat {
        font-size: 150px;
        color: #e00;
        animation: beat 1s infinite alternate;
        transform-origin: center;
    }



    /* Heart beat animation */
    @keyframes beat {
        to {
            transform: scale(.95);
        }
    }
</style>
