<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SuckBlow</title>
  <link rel="icon" href="{{('assets/logo.png')}}" style="width:12px; height:10px"  type="image/png">
  <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/nouislider/nouislider.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style type="text/css">
    #myCarousel .carousel-item .mask {
      position: absolute;
      top: 0;
      left:0;
      height:100%;
      width: 100%;
      background-attachment: fixed;
    }
    #myCarousel h4{
      font-size:50px;
      margin-bottom:15px;
      color:#FFF;
      line-height:100%;
      letter-spacing:0.5px;
      font-weight:600;
    }
    #myCarousel p{
      font-size:18px;
      margin-bottom:15px;
      color:#d5d5d5;
    }
    #myCarousel .carousel-item a{background:#F47735; font-size:14px; color:#FFF; padding:13px 32px; display:inline-block; }
    #myCarousel .carousel-item a:hover{background:#394fa2; text-decoration:none;  }

    #myCarousel .carousel-item h4{-webkit-animation-name:fadeInLeft; animation-name:fadeInLeft;} 
    #myCarousel .carousel-item p{-webkit-animation-name:slideInRight; animation-name:slideInRight;} 
    #myCarousel .carousel-item a{-webkit-animation-name:fadeInUp; animation-name:fadeInUp;}
    #myCarousel .carousel-item .mask img{-webkit-animation-name:slideInRight; animation-name:slideInRight; display:block; height:auto; max-width:100%;}
    #myCarousel h4, #myCarousel p, #myCarousel a, #myCarousel .carousel-item .mask img{-webkit-animation-duration: 1s;
      animation-duration: 1.2s;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;
    }
    #myCarousel .container {max-width: 1430px;  }
    #myCarousel .carousel-item{height:100%; min-height:550px; }
    #myCarousel{position:relative; z-index:1; background:url(https://i.imgur.com/6axE29k.jpg) center center no-repeat; background-size:cover; }

    .carousel-control-next, .carousel-control-prev{height:40px; width:40px; padding:12px; top:50%; bottom:auto; transform:translateY(-50%); background-color: #f47735; }


    .carousel-item {
      position: relative;
      display: none;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      width: 100%;
      transition: -webkit-transform .6s ease;
      transition: transform .6s ease;
      transition: transform .6s ease,-webkit-transform .6s ease;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      -webkit-perspective: 1000px;
      perspective: 1000px;
    }
    .carousel-fade .carousel-item {
      opacity: 0;
      -webkit-transition-duration: .6s;
      transition-duration: .6s;
      -webkit-transition-property: opacity;
      transition-property: opacity
    }
    .carousel-fade .carousel-item-next.carousel-item-left, .carousel-fade .carousel-item-prev.carousel-item-right, .carousel-fade .carousel-item.active {
      opacity: 1
    }
    .carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-right.active {
      opacity: 0
    }
    .carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
      -webkit-transform: translateX(0);
      -ms-transform: translateX(0);
      transform: translateX(0)
    }
    @supports (transform-style:preserve-3d) {
      .carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
        -webkit-transform:translate3d(0, 0, 0);
        transform:translate3d(0, 0, 0)
      }
    }
    .carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
      -webkit-transform: translate3d(0,0,0);
      transform: translate3d(0,0,0);
    }


    
    @-webkit-keyframes fadeInLeft {
      from {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0);
      }

      to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    @keyframes fadeInLeft {
      from {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0);
      }

      to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    .fadeInLeft {
      -webkit-animation-name: fadeInLeft;
      animation-name: fadeInLeft;
    }

    @-webkit-keyframes fadeInUp {
      from {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
      }

      to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
      }

      to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    .fadeInUp {
      -webkit-animation-name: fadeInUp;
      animation-name: fadeInUp;
    }

    @-webkit-keyframes slideInRight {
      from {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        visibility: visible;
      }

      to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    @keyframes slideInRight {
      from {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        visibility: visible;
      }

      to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    .slideInRight {
      -webkit-animation-name: slideInRight;
      animation-name: slideInRight;
    }

  </style>
</head>
<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href=""><img src="{{asset('logo.png')}}" style="width: 100px; height: 80px" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/about')}}">About</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/blog')}}">Blog</a></li>  
            <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>            
          </ul>
          @guest
            <ul class="nav-shop">
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}" style="color:white;">Sign Up</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"style="color:white;">Login</a></li>
            </ul>
          @else
            <ul class="nav-shop">

              <li class="nav-item">
                @if(Auth::guard('partner')->check())
                  <a href="{{url('/partner/select')}}" class="nav-link">
                      <strong>Add Post</strong>
                  </a>
                @else
                    <a href="{{url('/user/select')}}" class="nav-link">
                        <strong>Add Post</strong>
                    </a>
                @endif
              </li>
              <li class="nav-item">
                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          @endguest
       </div>
     </div>
   </nav>
 </div>
</header>
<!--================ End Header Menu Area =================-->

 <style type="text/css">
  .row {
   display:-ms-flexbox;
   display:flex;
   -ms-flex-wrap:wrap;
   flex-wrap:wrap;
   margin-right:-400px;
   margin-left:-30px
 }
</style>
 <!--================ Hero banner start =================-->
<section>
  <div class="container">
    <div class="text-muted mt-5 mb-5 text-center display-4">Add Post</div>
    <hr/>
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 p-2">
        <div class="card p-3 shadow text-center border-0">
          <div class="card-body">
            <a href="">
              <img src="{{asset('img/gear.png')}}" style="width: 60px; height: 62px;"> </a>                           <hr/>
              <h2 class="card-title display-1" style="font-size:3.0vmin;"><a href="{{url($url.'/gear/create')}}" >Gear</a></h2>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 p-2">
          <div class="card p-3 shadow text-center border-0">
            <div class="card-body">
              <a href="">
               <img src="{{asset('img/trip.svg')}}" style="width: 60px; height: 62px;"></a>                              <hr/>
               <h2 class="card-title display-1" style="font-size:3.0vmin;"><a href="{{url($url.'/'.$url.'trip/create')}}" >Trip</a></h2>
             </div>
           </div>
         </div>
         <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 p-2">
          <div class="card p-3 shadow text-center border-0">
            <div class="card-body">
              <a href="">
               <img src="{{asset('img/course.svg')}}" style="width: 60px; height: 62px;"></a>                  
               <hr/>
               <h2 class="card-title display-1" style="font-size:3.0vmin;"><a href="{{url($url.'/course/create')}}" >Course</a></h2>
             </div>
           </div>
         </div>

       </div>
     </div>
   </section>

<!--================ Start footer Area  =================-->  
<footer class="footer">
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
             <li><a href="{{url('/')}}">Home</a></li>
             <li><a href="{{url('/about')}}">About</a></li>
             <li><a href="{{url('/blog')}}">Blog</a></li>
             <li><a href="{{url('/contact')}}">Contact</a></li>
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


<script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendors/skrollr.min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('vendors/mail-script.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>