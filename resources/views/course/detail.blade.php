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
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="owl-carousel owl-theme s_Product_carousel">
                <div class="single-prd-item">
                    <img src="{{ asset('/'.$course->image) }}" alt="IMG-PRODUCT" >
                </div>
            </div>v
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <h3>{{$course->name}}</h3>
                            </tr>
                            <tr>
                                <th>Agency</th>
                                <td>{{$course->agency}}</td>
                            </tr>
                            <tr>
                                <th>Diver ID</th>
                                <td>{{$course->diver}}</td>
                            </tr>
                            <tr>
                                <th>Dive Center</th>
                                <td>{{$course->center}}</td>
                            </tr>
                            <tr>
                                <th>Total Dive Log</th>
                                <td>{{$course->total}}</td>
                            </tr>
                            <tr>
                                <th>Dive Since</th>
                                <td>{{$course->since}}</td>
                            </tr>
                            <tr>
                                <th>Qualification</th>
                                <td>
                                    <div class="col-md-6" style="padding-top: 5px">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="qual1" id="qual1" disabled {{ ($course->open == 1) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="qual1">
                                        Open Water Diver
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="qual2" id="qual2" disabled {{ ($course->advance == 1) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="qual2">
                                        Advanced Diver
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="qual3" id="qual3" disabled {{ ($course->rescue == 1) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="qual3">
                                        Rescue Diver
                                    </label>
                                </div><div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="qual4" id="qual4" disabled {{ ($course->master == 1) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="qual4">
                                        Dive Master
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="qual5" id="qual5" disabled {{ ($course->instructor == 1) ? 'checked = "checked" ' :''}}>
                                    <label class="form-check-label" for="qual5">
                                        Instructor Training Course
                                    </label>
                                </div>
                            </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Facebook</th>
                                <td>{{$course->fb}}</td>
                            </tr>
                            <tr>
                                <th>Instagram</th>
                                <td>{{$course->ig}}</td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <img src="{{ asset('/'.$course->image) }}" alt="IMG-PRODUCT" width="150" height="150">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
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