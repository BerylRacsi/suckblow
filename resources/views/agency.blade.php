<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SuckBlow</title>
  <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">
  <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/nouislider/nouislider.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 75%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
  </style>
  <style type="text/css">
    html {
      font-size: 62.5%;
    }

    body {
      font-family: "Montserrat", sans-serif;
    }

    button:focus {
      outline: none;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    a,
    a:hover {
      text-decoration: none;
      display: inline-block;
      -webkit-transition: 0.3s ease-in-out;
      transition: 0.3s ease-in-out;
    }

    img {
      display: inline-block;
      max-width: 100%;
    }

    @media (min-width: 1200px) {
      .container {
        max-width: 1300px;
      }
    }

    #main-carousel {
      margin-top: 0px;
      text-shadow: 1px 2px 3px #0000001f;
    }

    #main-carousel h5 {
      font-size: 3rem;
      font-family: inherit;
      font-weight: 300;
      -webkit-animation: leftToRight 1s ease-in-out .5s;
      animation: leftToRight 1s ease-in-out .5s;
    }

    #main-carousel h2 {
      font-size: 6.6rem;
      font-weight: 900;
      font-family: inherit;
      letter-spacing: 2px;
      -webkit-animation: topToBottom 1s linear .3s;
      animation: topToBottom 1s linear .3s;
    }

    #main-carousel .carousel-caption {
      right: 15%;
      bottom: unset;
      top: 50%;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      text-align: left;
    }

    #main-carousel .carousel-control-next,
    #main-carousel .carousel-control-prev {
      top: 50%;
      bottom: unset;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      width: 4%;
      font-size: 3.5rem;
      background-color: rgba(255, 255, 255, 0.2);
      padding: 5px;
      -webkit-transition: 5s all;
      transition: 5s all;
    }

    #main-carousel .carousel-control-next {
      border-top-left-radius: 50px;
      border-bottom-left-radius: 50px;
    }

    #main-carousel .carousel-control-prev {
      border-top-right-radius: 50px;
      border-bottom-right-radius: 50px;
    }

    #main-carousel .btn-info {
      background: transparent;
      text-transform: uppercase;
      border: 0;
      font-family: "helveticaregular";
      font-size: 1.8rem;
      position: relative;
      padding: 20px 0 0;
      margin: 20px 0 0;
    }

    #main-carousel .btn-info::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 63px;
      height: 5px;
      background-color: #fff;
    }

    .home__form {
      padding: 1.5rem;
      background-color: #fff;
      -webkit-box-shadow: 0 0 1.5rem rgba(0, 0, 0, 0.2);
      box-shadow: 0 0 1.5rem rgba(0, 0, 0, 0.2);
      position: relative;
      z-index: 1;
      top: -50px;
      font-size: 1.6rem;
      width: 80%;
      margin: auto;
    }

    .home__form h3 {
      font-size: 2.6rem;
      font-weight: bold;
    }

    .home__form p {
      font-size: 1.4rem;
      margin-bottom: 1.5rem;
    }

    .home__form form {
      text-align: left;
    }

    .home__form form label {
      font-size: 1.4rem;
      color: rgba(0, 0, 0, 0.7);
      font-family: "helveticaregular";
    }

    .home__form form .input-box {
      position: relative;
    }

    .home__form form .input-box .fa {
      position: absolute;
      right: 0;
      top: 50%;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      border-left: 1px solid #cdcdcd;
      padding: 3px 15px 3px 10px;
      color: #898989;
    }

    .home__form form .input-box input {
      height: 45px;
    }

    .home__form form .input-box textarea,
    .home__form form .input-box input {
      border-color: #efefef;
      -webkit-box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.05);
      box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.05);
      border-radius: 5px;
      font-size: 1.6rem;
      padding: 10px;
      caret-color: #fc5546;
    }

    .home__form form .input-box textarea:focus + .fa,
    .home__form form .input-box input:focus + .fa {
      color: #fc5546;
      border-color: #fc5546;
    }

    .home__form form .input-box textarea:not(:placeholder-shown),
    .home__form form .input-box input:not(:placeholder-shown) {
      border-color: green;
    }

    .btn.btn-danger {
      width: 100%;
      height: 45px;
      font-size: 1.7rem;
      background-color: #fc5546;
      text-transform: uppercase;
      border-radius: 5px;
      border-color: transparent;
      -webkit-transition: .3s all;
      transition: .3s all;
    }

    .btn.btn-danger:hover {
      background: #231833;
    }

    .btn-more {
      font-size: 1.6rem;
      color: #000;
      font-family: "helveticaregular";
    }

    .btn-more span {
      border-bottom: 1px dotted #000;
    }


    @-webkit-keyframes leftToRight {
      0% {
        opacity: 0;
        -webkit-transform: translateX(-80px);
        transform: translateX(-80px);
      }
      80% {
        -webkit-transform: translateX(20px);
        transform: translateX(20px);
        opacity: .7;
      }
      100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
      }
    }

    @keyframes leftToRight {
      0% {
        opacity: 0;
        -webkit-transform: translateX(-80px);
        transform: translateX(-80px);
      }
      80% {
        -webkit-transform: translateX(20px);
        transform: translateX(20px);
        opacity: .7;
      }
      100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
      }
    }

    @-webkit-keyframes topToBottom {
      0% {
        opacity: 0;
        -webkit-transform: translateY(-50px);
        transform: translateY(-50px);
      }
      80% {
        -webkit-transform: translateY(10px);
        transform: translateY(10px);
        opacity: .7;
      }
      100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
      }
    }

    @keyframes topToBottom {
      0% {
        opacity: 0;
        -webkit-transform: translateY(-50px);
        transform: translateY(-50px);
      }
      80% {
        -webkit-transform: translateY(10px);
        transform: translateY(10px);
        opacity: .7;
      }
      100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
      }
    }

  </style>
</head>
<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
             <a class="navbar-brand logo_h" href="home.html"><img src="logo.png" style="width: 100px; height: 80px" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
          <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
           <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
           <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>  <li class="nav-item"><a class="nav-link" href="kontak.html">Contact</a></li>          
         </ul>

         <ul class="nav-shop">
          <li class="nav-item"><a class="nav-link" href="register.html" style="color:white;">Sign Up</a></li>
          <li class="nav-item"><a class="nav-link" href="login.html"style="color:white;">Login</a></li>
          <li class="nav-item"><a class="button button-header" href="postads.html">Add Post</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    
  </header>
  <!--================ End Header Menu Area =================-->
  <div id="main-carousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://picsum.photos/1600/501" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://picsum.photos/1600/502" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
       </div>
     </div>
   </div>
   <a class="carousel-control-prev" href="#main-carousel" role="button" data-slide="prev">
    <i class="fa fa-angle-left" aria-hidden="true"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#main-carousel" role="button" data-slide="next">
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
<section class="home__form">
  <div class="container">
    <div class="home__form-container text-center">
      <form id="form_search" >
       
        <div class="row">
          <div class="col">

            <div class="form-group">
             
             <div class="input-box ">
               <input type="text"  name="title" id="title" placeholder="search location" class="form-control col-md-11">
               <i class="fa fa-search" type="submit" value="Cari" aria-hidden="true"></i>
             </div>
           </div>
         </div>
         <div class="col-2"><button type="submit" value="Cari" class="btn btn-danger">Search</button></div>
       </div>
       
     </form>
   </div>
 </div>
</section>
<hr>
<br>
<br>
<section class="section-margin calc-60px">
  <div class="container">
    <div class="section-intro pb-60px">
    </div>
    <div class="row">
      @foreach($agencies as $agency)
        <div class="col-md-6 col-lg-4 col-xl-3">
          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="card-img" src="{{asset('images/diving-3.jpg')}}" alt="">
              <ul class="card-product__imgOverlay">
                  <a href="{{url($url.'/course/')}}"><strong>View More</strong></a>
              </ul>
            </div>
          </div>
          <div class="card-body text-center">
            <h4 class="card-product__title"><a href="detailcourse.html">{{$agency->name}}</a></h4>
          </div>
        </div>
    @endforeach
    </div> 
  </div>
</section>

  <hr>

  <footer>
    <div class="footer-area">
     <div class="container">
      <div class="row section_gap">
       <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-footer-widget tp_widgets">
         <h4 class="footer_title large_title">Our Mission</h4>
         <p>
          So seed seed green that winged cattle in. Gathering thing made fly you're no 
          divided deep moved us lan Gathering thing us land years living.
        </p>
        <p>
          So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
        </p>
      </div>
    </div>
    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
      <div class="single-footer-widget tp_widgets">
       <h4 class="footer_title">Quick Links</h4>
       <ul class="list">
        <li><a href="home.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="kontak.html">Contact</a></li>
       </ul>
     </div>
   </div>
   <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
    <div class="single-footer-widget tp_widgets">
      <h4 class="footer_title">Contact Us</h4>
      <div class="ml-40">
        <p class="sm-head">
          <span class="fa fa-location-arrow"></span>
          SukBlow Office
        </p>
        <p>123, Main Street, Your City</p>
        
        <p class="sm-head">
          <span class="fa fa-phone"></span>
          Phone Number
        </p>
        <p>
          +62 456 7890 <br>
          +62 456 7890
        </p>
        
        <p class="sm-head">
          <span class="fa fa-envelope"></span>
          Email
        </p>
        <p>
          revo.suckblowp@gmail.com <br>
        </p>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="footer-bottom">
 <div class="container">
  <div class="row d-flex">
   
  </div>
</div>
</div>
</footer>
<!--================ End footer Area  =================-->
   <script src="js/swiper.min.js"></script>
      <script>
        var swiper = new Swiper('.swiper-container', {
          slidesPerView: 3,
          spaceBetween: 30,
          slidesPerGroup: 3,
          loop: true,
          loopFillGroupWithBlank: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });
      </script>
      
<script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendors/skrollr.min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>

<script src="{{asset('vendors/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('vendors/mail-script.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-ui.js')}}" type="text/javascript"></script>
</body>
</html>