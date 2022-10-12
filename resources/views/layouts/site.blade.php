<!DOCTYPE html>
<html lang="en">
<head>
  <title>Photosen &mdash; Colorlib Website Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{url('public/photosen')}}/fonts/icomoon/style.css">

  <link rel="stylesheet" href="{{url('public/photosen')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('public/photosen')}}/css/magnific-popup.css">
  <link rel="stylesheet" href="{{url('public/photosen')}}/css/jquery-ui.css">
  <link rel="stylesheet" href="{{url('public/photosen')}}/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{url('public/photosen')}}/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="{{url('public/photosen')}}/css/lightgallery.min.css">    

  <link rel="stylesheet" href="{{url('public/photosen')}}/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="{{url('public/photosen')}}/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="{{url('public/photosen')}}/css/swiper.css">

  <link rel="stylesheet" href="{{url('public/photosen')}}/css/aos.css">

  <link rel="stylesheet" href="{{url('public/photosen')}}/css/style.css">

</head>
<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    



    <header class="site-navbar py-3" role="banner">

      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2" data-aos="fade-down">
            <h1 class="mb-0"><a href="{{route('home.home')}}" class="text-white h2 mb-0">Photosen</a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class=""><a href="{{route('home.home')}}">Home</a></li>
                <li class="has-children">
                  <a href="single.html">Gallery</a>
                  <ul class="dropdown">
                    <li><a href="{{route('home.canhan')}}">Cá nhân</a></li>
                    <li><a href="{{route('home.banbe')}}">Bạn bè</a></li>
                    <li><a href="{{route('home.nguoithan')}}">Người thân</a></li>
                  </ul>
                </li>
                <li><a href="{{route('home.service')}}">Services</a></li>
                <li><a href="{{route('home.about')}}">About</a></li>
                <li><a href="{{route('home.contact')}}">Contact</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-youtube-play"></span></a>
                </li>
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

    @yield('main')

    <div class="footer py-4">
      <div class="container-fluid text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>

    

    
    
  </div>

  <script src="{{url('public/photosen')}}/js/jquery-3.3.1.min.js"></script>
  <script src="{{url('public/photosen')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{url('public/photosen')}}/js/jquery-ui.js"></script>
  <script src="{{url('public/photosen')}}/js/popper.min.js"></script>
  <script src="{{url('public/photosen')}}/js/bootstrap.min.js"></script>
  <script src="{{url('public/photosen')}}/js/owl.carousel.min.js"></script>
  <script src="{{url('public/photosen')}}/js/jquery.stellar.min.js"></script>
  <script src="{{url('public/photosen')}}/js/jquery.countdown.min.js"></script>
  <script src="{{url('public/photosen')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{url('public/photosen')}}/js/bootstrap-datepicker.min.js"></script>
  <script src="{{url('public/photosen')}}/js/swiper.min.js"></script>
  <script src="{{url('public/photosen')}}/js/aos.js"></script>

  <script src="{{url('public/photosen')}}/js/picturefill.min.js"></script>
  <script src="{{url('public/photosen')}}/js/lightgallery-all.min.js"></script>
  <script src="{{url('public/photosen')}}/js/jquery.mousewheel.min.js"></script>

  <script src="{{url('public/photosen')}}/js/main.js"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>
</body>
</html>