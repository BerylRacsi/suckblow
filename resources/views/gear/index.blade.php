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
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
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
                <a id="navbarDropdown" class="dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
 <div class="container">
  <div class="row">
    <!-- <h2>Search</h2> -->
  </div>
  <div class="row">
    <form id="form_search" >
     <div class="input-group">
      <input type="text" name="title" class="form-control" id="title" placeholder="Title" style="width:1000px; height: 40px">
      <span class="input-group-btn">
        <button class="btn btn-primary" style="height: 40px" type="submit">Search</button>
      </span>
    </div>
  </form>
</div>
</div>
</header>
<section class="section-margin--small mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                BCD
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Mask
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Hook
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Regulator
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item ">
                        <div style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                SMB
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Torch
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @foreach($gears as $gear)
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    @foreach (explode(',', $gear->image) as $image)
                                        <img class="card-img" src="{{ asset('/',$image) }}" alt="IMG-PRODUCT">       @break
                                    @endforeach
                                </div>
                                <div class="card-body">
                                    <h5 class="card-product__title"><a href="{{url($url.'/gear/'.$gear->id)}}">{{$gear->name}}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
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