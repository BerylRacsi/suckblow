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
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}" style="color:white;">Sign Up</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"style="color:white;">Login</a></li>
            </ul>
       </div>
     </div>
   </nav>
 </div>
</header>
<!--================ End Header Menu Area =================-->


<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="button button-account" href="{{ route('register') }}">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    @isset($url)
                    <h3 style="margin-bottom: 30px;">Partner Login</h3>
                    <a href="{{url('login/')}}">or Login as User</a>
                    <form method="POST" class="row login_form" id="contactForm" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                    <h3 style="margin-bottom: 30px;">User Login</h3>
                    <a href="{{url('login/partner')}}">or Login as Partner</a>
                    <form method="POST" class="row login_form" id="contactForm" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                        @csrf
                        <div class="col-md-12 form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="col-md-12 form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="f-option2">Keep me logged in</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-login w-100">Login</button>
                            @if (Route::has('password.request'))
                                    <a  href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <button class="button button-register w-100">Sign in with Google</button>
                        </div>
                        <div class="col-md-12 form-group">
                            <button  class="button button-fb w-100">Sign in with Facebook</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
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