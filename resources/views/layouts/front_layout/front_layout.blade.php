<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">
<title>Travel Agency | Home</title>
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/fontawesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/solid.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/regular.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/brands.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/font-awesome-4.7.0/css/font-awesome-4.7.0.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fonts.css') }}"/>
<!--<link rel="stylesheet" type="text/css" href="fonts/flaticon font/flaticon.css">-->
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap-touch-slider.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('front/lightbox/css/lightbox.css') }}">
<!--<link rel="stylesheet" type="text/css" href="css/hover-min.css"/>-->
<link rel="stylesheet" type="text/css" href="{{ asset('front/SmartDroddownMenus/smart_dropdown.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.carouselv2.3.4.css') }}"/>
<link rel="stylesheet" type="text/css"  href="{{ asset('front/css/reset.css') }}"/>
<!--<link rel="stylesheet" type="text/css" href="css/custom.css" />-->
<!--<link rel="stylesheet" type="text/css" href="css/layout.css" />-->
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/side_nav.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/navbar.css') }}"/>
<!--<link rel="stylesheet" type="text/css" href="css/navbar_2.css"/>-->
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>


    @include('layouts.front_layout.front_header')
    @yield('content')
    @include('layouts.front_layout.front_footer')

    <section class="back_top"><!--//back to top scroll-->
        <div class="container">
          <div id="back-top" style="display: block;"> <a href="#top" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
        </div>
      </section>
      <!--//back to top scroll--> 
      
      <script type="text/javascript" src="{{ asset('front/js/jquery-1.9.1.min.js') }}"></script> 
      <!--====VIDEO LIGHTBOX STARTS====--> 
      <script>
      // Function to reveal lightbox and adding YouTube autoplay
      function revealVideo(div,video_id) {
        $('body').addClass('popup');
       <!-- $('.trek_slide').hide();-->
        var video = document.getElementById(video_id).src;
        document.getElementById(video_id).src = video+'&autoplay=1'; // adding autoplay to the URL
        document.getElementById(div).style.display = 'block';
      }
      
      // Hiding the lightbox and removing YouTube autoplay
      function hideVideo(div,video_id) {
        $('body').removeClass('popup');
      <!--  $('.trek_slide').show();-->
        var video = document.getElementById(video_id).src;
        var cleaned = video.replace('&autoplay=1',''); // removing autoplay form url
        document.getElementById(video_id).src = cleaned;
        document.getElementById(div).style.display = 'none';
      }
       jQuery(function(){
      
      });
      
      </script> 
      
      <!--/*====VIDEO LIGHTBOX JQUERY ENDS====*/--> 
      <script type="text/javascript" src="{{ asset('front/js/owl.carouselv2.3.4.js') }}"></script> 
      <script type="text/javascript">
      
      
      
      $('.specialities_content .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots:true,
        nav: true,
       
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          
         480: {
          items: 2
        },
          
          600: {
            items: 3
          },
          1000: {
            items: 4
          }
        }
        
      })
      
      
      
      
      
      
      
      
      
      $('.destination-section .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots:true,
        nav: true,
       
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          
         480: {
          items: 2
        },
          
          600: {
            items: 3
          },
          1000: {
            items: 3
          }
        }
        
      })
      
      
      
      
      
      
      
      
      
      $('.testimonial_content .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: [
          "<i class='fa fa-caret-left'></i>",
          "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
       
       
           480: {
          items: 1
        },
          
          600: {
            items: 1
          },
          
          1000: {
            items:1
          }
        }
      })
       
       
      </script> 
      <script type="text/javascript" src="{{asset('front/js/fixed-nav.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/js/jquery.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/js/bootstrap.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/js/Push_up_jquery.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/js/equalheight.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/SmartDroddownMenus/smart_dropdown.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/js/annimatable_jquery.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/js/side_nav.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/js/touch_jquery.js')}}"></script> 
      <script type="text/javascript" src="{{asset('front/js/bootstrap-touch-slider.js')}}"></script> 

      <script type="text/javascript" src="{{asset('front/js/front_script.js')}}"></script> 
      
      </body>
      </html>