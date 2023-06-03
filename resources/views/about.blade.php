 @extends('layouts/app')
@section('content')


  <div class="jumbotron text-center" style="background-image: url({{ asset('imgs/about1.jpg') }})">
    <h1 class="display-4"><a href="#about">About Us</a></h1>
    <h3 class="text-dark">Welcome to our online watch store, where timepieces meet elegance.</h3>
  </div>

  <div class="container" id="about">
    <h1 class="text-center">Our Story</h1>
    <p>At our store, we are passionate about providing our customers with a wide selection of high-quality watches that combine style, craftsmanship, and functionality. Whether you're looking for a classic timepiece or a modern smartwatch, we have something to suit every taste and occasion.</p>
    <p>Our dedicated team of watch enthusiasts carefully curates our collection, ensuring that each watch meets our strict standards of quality and design. We work with reputable brands and strive to offer a diverse range of styles, from sleek minimalist designs to bold statement pieces.</p>
    <p>Customer satisfaction is our top priority, and we aim to provide an exceptional shopping experience. Our knowledgeable staff is always ready to assist you in finding the perfect watch and answer any questions you may have. We also offer secure and convenient online ordering, ensuring that your shopping experience is smooth and hassle-free.</p>
    <div class="store-info">
      <img src="{{ asset("imgs/logo.png") }}" alt="Watch Store Logo">
      <p>{{ $user->location }}</p>
    </div>
  </div>



@endsection
<style>


    .jumbotron {
      background-color: #504e4e;
      color: #fff;
      padding: 80px;
      margin-bottom: 0;
      position:  fixed;
      width: 100%;
      height: 89%;
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      position: relative;

    }


    h1 {
      font-size: 28px;
      color: #333;
      margin-bottom: 30px;
    }
   .display-4 a {
        text-decoration: none;
        color: #333;

    }

    p {
      font-size: 1.4rem;
      line-height: 1.6;
    }

    .store-info {
      text-align: center;
      margin-bottom: 40px;
    }



    .store-info h3 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    .store-info p {
      color: #777;
    }
  </style>
