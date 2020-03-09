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

  <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
       </div>
     </div>
   </nav>
 </div>
</header>
<!--================ End Header Menu Area =================-->

<main class="site-main">
  
 <style type="text/css"></style>
 <!--================ Hero banner start =================-->
 <section class="blog_categorie_area">
  <div class="row" >
      <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
        <div class="categories_post">
         <img src="{{asset('img/home/gear.png')}}" alt="" class="img-fluid" style="width: 443px; margin-right: 10px;">
         <div class="categories_details">
          <div class="categories_text">
            @if(Auth::guard('partner')->check())
                <a href="{{url('/partner/gear')}}">
                    <h5>Gear</h5>
                </a>
            @else
                <a href="{{url('/user/gear')}}">
                    <h5>Gear</h5>
                </a>
            @endif
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
    <div class="categories_post">
      <img src="{{asset('img/home/island-01.png')}}" alt="" class="img-fluid" style="width: 443px; margin-right: 10px;">
      <div class="categories_details">
        <div class="categories_text">
            @if(Auth::guard('partner')->check())
                <a href="{{url('/partner/trip')}}">
                    <h5>Trip</h5>
                </a>
            @else
                <a href="{{url('/user/trip')}}">
                    <h5>Trip</h5>
                </a>
            @endif
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
    <div class="categories_post">
      <img src="{{asset('img/home/courses.png')}}" alt="" class="img-fluid" style="width: 443px; margin-right: 10px;">
      <div class="categories_details">
        <div class="categories_text">
            @if(Auth::guard('partner')->check())
                <a href="{{url('/partner/course')}}">
                    <h5>Course</h5>
                </a>
            @else
                <a href="{{url('/user/course')}}">
                    <h5>Course</h5>
                </a>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ================ offer section start ================= --> 
<section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px 30px" >
  <div class="container">
    <div class="row">
      <div class="col-xl-5">
        <div class="offer__content text-center">
          <h3>Up To 50% Off</h3>
          <h4>SuckBlow Sale</h4>
          <p>Him she'd let them sixth saw light</p>
          <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ offer section end ================= --> 
</main>
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