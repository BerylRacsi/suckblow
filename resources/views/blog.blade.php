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
<hr>

<!--================Blog Area =================-->
<section class="blog_area">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="blog_left_sidebar">
          <article class="row blog_item">
            <div class="col-md-3">
              <div class="blog_info text-right">
                <div class="post_tag">
                 <a href="#">Diving,</a>
                 <a class="active" href="#">Technology,</a>
                 <a href="#">Enviroment,</a>
                 <a href="#">Travel</a>
               </div>
               <ul class="blog_meta list">
                <li>
                  <a href="#">Mark wiens
                    <i class="lnr lnr-user"></i>
                  </a>
                </li>
                <li>
                  <a href="#">12 Dec, 2017
                    <i class="lnr lnr-calendar-full"></i>
                  </a>
                </li>
                <li>
                  <a href="#">1.2M Views
                    <i class="lnr lnr-eye"></i>
                  </a>
                </li>
                <li>
                  <a href="#">06 Comments
                    <i class="lnr lnr-bubble"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="blog_post">
              <img src="img/blog/main-blog/m-blog-2.jpg" alt="">
              <div class="blog_details">
                <a href="astronomy.html">
                  <h2>5 Holiday Gift Ideas For Freedivers</h2>
                </a>
                <p>We’ve taken the stress out of shopping for your favourite freediver with 5 Holiday gift ideas for freedivers that’ll blow their reindeer socks off!.</p>
                <a href="astronomy.html" class="button button-blog">View More</a>
              </div>
            </div>
          </div>
          
          
        </article>
        <article class="row blog_item">
          <div class="col-md-3">
            <div class="blog_info text-right">
              <div class="post_tag">
                <a href="#">Diving,</a>
                <a class="active" href="#">Technology,</a>
                <a href="#">Enviroment,</a>
                <a href="#">Travel</a>
              </div>
              <ul class="blog_meta list">
                <li>
                  <a href="#">Mark wiens
                    <i class="lnr lnr-user"></i>
                  </a>
                </li>
                <li>
                  <a href="#">12 Dec, 2017
                    <i class="lnr lnr-calendar-full"></i>
                  </a>
                </li>
                <li>
                  <a href="#">1.2M Views
                    <i class="lnr lnr-eye"></i>
                  </a>
                </li>
                <li>
                  <a href="#">06 Comments
                    <i class="lnr lnr-bubble"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="blog_post">
              <img src="img/blog/main-blog/m-blog-1.jpg" alt="">
              <div class="blog_details">
                <a href="astronomy.html">
                  <h2>Assemble Emergency Kit Essentials in 30 Minutes or Less </h2>
                </a>
                <p>To help counteract some of the incorrect information and out-dated ideas circulating out there, we put together a list of the most common scuba diving myths.</p>
                <a class="button button-blog" href="astronomy.html">View More</a>
              </div>
            </div>
          </div>
        </article>
        <article class="row blog_item">
          <div class="col-md-3">
            <div class="blog_info text-right">
              <div class="post_tag">
                <a href="#">Diving,</a>
                <a class="active" href="#">Technology,</a>
                <a href="#">Enviroment,</a>
                <a href="#">Travel</a>
              </div>
              <ul class="blog_meta list">
                <li>
                  <a href="#">Mark wiens
                    <i class="lnr lnr-user"></i>
                  </a>
                </li>
                <li>
                  <a href="#">12 Dec, 2017
                    <i class="lnr lnr-calendar-full"></i>
                  </a>
                </li>
                <li>
                  <a href="#">1.2M Views
                    <i class="lnr lnr-eye"></i>
                  </a>
                </li>
                <li>
                  <a href="#">06 Comments
                    <i class="lnr lnr-bubble"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="blog_post">
              <img src="img/blog/main-blog/m-blog-4.jpg" alt="">
              <div class="blog_details">
                <a href="single-blog.html">
                  <h2>The Night Sky</h2>
                </a>
                <p>MCSE boot camps have its supporters and its detractors. Some people do not understand
                  why you should have to spend money on boot camp when you can get the MCSE study
                materials yourself at a fraction.</p>
                <a href="single-blog.html" class="button button-blog">View More</a>
              </div>
            </div>
          </div>
        </article>
        <article class="row blog_item">
          <div class="col-md-3">
            <div class="blog_info text-right">
              <div class="post_tag">
                <a href="#">Diving,</a>
                <a class="active" href="#">Technology,</a>
                <a href="#">Enviroment,</a>
                <a href="#">Travel</a>
              </div>
              <ul class="blog_meta list">
                <li>
                  <a href="#">Mark wiens
                    <i class="lnr lnr-user"></i>
                  </a>
                </li>
                <li>
                  <a href="#">12 Dec, 2017
                    <i class="lnr lnr-calendar-full"></i>
                  </a>
                </li>
                <li>
                  <a href="#">1.2M Views
                    <i class="lnr lnr-eye"></i>
                  </a>
                </li>
                <li>
                  <a href="#">06 Comments
                    <i class="lnr lnr-bubble"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="blog_post">
              <img src="img/blog/main-blog/m-blog-5.jpg" alt="">
              <div class="blog_details">
                <a href="single-blog.html">
                  <h2>Telescope</h2>
                </a>
                <p>MCSE boot camps have its supporters and its detractors. Some people do not understand
                  why you should have to spend money on boot camp when you can get the MCSE study
                materials yourself at a fraction.</p>
                <a href="single-blog.html" class="button button-blog">View More</a>
              </div>
            </div>
          </div>
        </article>
        <nav class="blog-pagination justify-content-center d-flex">
          <ul class="pagination">
            <li class="page-item">
              <a href="#" class="page-link" aria-label="Previous">
                <span aria-hidden="true">
                  <span class="lnr lnr-chevron-left"></span>
                </span>
              </a>
            </li>
            <li class="page-item active">
              <a href="#" class="page-link">01</a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link">02</a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link">03</a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link">04</a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link">09</a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link" aria-label="Next">
                <span aria-hidden="true">
                  <span class="lnr lnr-chevron-right"></span>
                </span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Posts">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                <i class="lnr lnr-magnifier"></i>
              </button>
            </span>
          </div>
          <!-- /input-group -->
          <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget author_widget">
          <img class="author_img rounded-circle" style="height: 80px" src="logo.png" alt="">
          <h4>SuckBlow</h4>
          <p>Blog writer</p>
          <div class="social_icon">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-github"></i>
            </a>
            <a href="#">
              <i class="fab fa-behance"></i>
            </a>
          </div>
          <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
            have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
            detractors.
          </p>
          <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget popular_post_widget">
          <h3 class="widget_title">Popular Posts</h3>
          <div class="media post_item">
            <img src="img/product/pusatdiving.jpg" alt="post">
            <div class="media-body">
              <a href="single-blog.html">
                <h3>Space The Final Frontier</h3>
              </a>
              <p>02 Hours ago</p>
            </div>
          </div>
          <div class="media post_item">
            <img src="img/product/duniadiving.jpg" alt="">
            <div class="media-body">
              <a href="single-blog.html">
                <h3>The Amazing Islands</h3>
              </a>
              <p>02 Hours ago</p>
            </div>
          </div>
          <div class="media post_item">
           <img src="img/product/divingcenter.jpg" alt="">
           <div class="media-body">
            <a href="single-blog.html">
              <h3>Scuba Diving Myths</h3>
            </a>
            <p>03 Hours ago</p>
          </div>
        </div>
        <div class="media post_item">
         <img src="img/product/divingtool.jpg" alt="">
         <div class="media-body">
          <a href="single-blog.html">
            <h3>Accesories Diving</h3>
          </a>
          <p>01 Hours ago</p>
        </div>
      </div>
      <div class="br"></div>
    </aside>
    
    <aside class="single_sidebar_widget post_category_widget">
      <h4 class="widget_title">Post Catgories</h4>
      <ul class="list cat-list">
        <li>
          <a href="#" class="d-flex justify-content-between">
            <p>Technology</p>
            <p>37</p>
          </a>
        </li>
        <li>
          <a href="#" class="d-flex justify-content-between">
            <p>Enviroment</p>
            <p>24</p>
          </a>
        </li>
        <li>
          <a href="#" class="d-flex justify-content-between">
            <p>Travel</p>
            <p>59</p>
          </a>
        </li>
        <li>
          <a href="#" class="d-flex justify-content-between">
            <p>Adventure</p>
            <p>44</p>
          </a>
        </li>
      </ul>
      <div class="br"></div>
    </aside>
    <aside class="single-sidebar-widget newsletter_widget">
      <h4 class="widget_title">Newsletter</h4>
      <p>
        Here, I focus on a range of items and features that we use in life without giving them a second thought.
      </p>
      <div class="form-group d-flex flex-row">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
          </div>
          <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email address" onfocus="this.placeholder = ''"
          onblur="this.placeholder = 'Enter email'">
        </div>
        <a href="#" class="bbtns">Subcribe</a>
      </div>
      <p class="text-bottom">You can unsubscribe at any time</p>
      <div class="br"></div>
    </aside>
    <aside class="single-sidebar-widget tag_cloud_widget">
      <h4 class="widget_title">Tag Clouds</h4>
      <ul class="list">
        <li>
         <a href="#" class="d-flex justify-content-between">
          <p>Technology</p>
          <p>37</p>
        </a>
      </li>
      <li>
        <a href="#" class="d-flex justify-content-between">
          <p>Envieoment</p>
          <p>24</p>
        </a>
      </li>
      <li>
        <a href="#" class="d-flex justify-content-between">
          <p>Travel</p>
          <p>59</p>
        </a>
      </li>
      <li>
        <a href="#" class="d-flex justify-content-between">
          <p>Adventure</p>
          <p>44</p>
        </a>
      </li>
    </ul>
  </aside>
</div>
</div>
</div>
</div>
</section>
<!--================Blog Area =================-->
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