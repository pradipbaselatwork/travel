@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\AboutUs;
use App\Testimonial;
// use App\Package;
use App\PackageType;
$aboutUs = AboutUs::first();
$testimonial = Testimonial::get();
$packageType = PackageType::get();
?>

<section class="billboard inner-page">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay">
       
          <div class="card-caption text-white">
           <div class="container">
            <div class="pulse animatable">
              <div class="breadCrumbNav">
                <div class="container breadcrumb-container">
                  <h1 class="breadCrumb_title"> About Us</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="index.html" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>About us</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="welcome_section section_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8 fadeInLeft animatable">
          <div class="detail">
            <h1 class="section_heading">About Us</h1>
            <!-- <h2>Tenzo Hotel</h2>-->
           <p>{!! $aboutUs->description !!}</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 fadeInRight animatable">
          <div class="detail deal-content">
            <h3>Best Deals</h3>
            <ul>
              @forelse($packageType as $data)
              <li><a href="#">{{ $data->package_type }}</a></li>
              @empty
              @endforelse
            </ul>
            <div class="mt-3"> <a href="mainpackage.html" class="btn btn-success view_btn text-white" >View more</a> </div>
          </div>
        </div>
      </div>   
    </div>
  </section>
 
  <section class="review_section py-5">
    <div class="bg-overlay"></div>
    <div class="container">
      <h2 class="section_title border center text-white">Guest Testimonials</h2>
      <div class="testimonial_content">
        <div class="carousel-wrap text-white">
          <div class="owl-carousel owl-theme">
            @forelse($testimonial as $data)
            <div class="item "> <a href="testimonial.html">
              <figure class="img-circle"> <img src="{{ asset($data->image) }}" alt=""> </figure>
              </a>
              <figcaption> <span class="author">{{ $data->title }}</span> <span class="post">{{ $data->profession }}</span>
                <p>{{ $data->description }}</p>
              </figcaption>
            </div>
            @empty
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lightbox_youtube my_video mt-5"><!--//lightbox_youtube starts-->
    <h2 class="section_title border center">Watch Video</h2>
    <div class="vid_background">
      <div class="button-wrapper">
        <button id="playme" onclick="revealVideo('video','youtube')" class="icon-video d-flex align-items-center justify-content-center"> <i class="fa-solid fa-play"></i> </button>
      </div>
      <div id="video" class="movie_lightbox" onclick="hideVideo('video','youtube')">
        <div class="lightbox-container">
          <div class="lightbox-content">
            <button onclick="hideVideo('video','youtube')" class="lightbox-close"> ✕ </button>
            <div class="video-container">
              <iframe id="youtube" width="960" height="540" src="https://www.youtube.com/embed/dpXyd1eiKqY?loop=1&rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  