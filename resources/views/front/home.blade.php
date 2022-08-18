@extends('layouts.front_layout.front_layout')
@section('content')
<?php
use App\About;
$about = About::first();
?>
<!-- ===============./BILLBOARD STARTS HERE=======================-->
  <section class="billboard">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay">
          <div class="card-caption text-white">
          <div class="container">
            <div class="pulse animatable">
              <h1 class="card-title text-sm-start">{{ $banner->title }}</h1>
              <p class="card-text">{{ $banner->description }}</p>
              <a href="#" class="btn view_btn btn-danger">View More <i class="fa fa-angle-double-right"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="trip-wrapper">
      <div class="container">
        <form action="{{ route('search') }}" method="get" role="form">
          @csrf
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active"> <a class="nav-link" href="#">Trip search</a>
                <div class="search-field">
                  <input type="search" name="query" class="form-control" placeholder="Search Destination">
                </div>
              </li>
           
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Check-in date</a>
                <div id="select_date">
                  <input type="date" name="start_date" class="form-control" required="">
                </div>
              </li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Check-out date</a>
                <div id="select_date">
                  <input type="date" name="end_date" class="form-control" required="">
                </div>
              </li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Price limit</a>
                <div class="select_dropdown">
                  <select name="prices" id="price-list" class="form-control" required>
                    <option value="0" selected>00</option>
                    <option value="10000">10,000</option>
                    <option value="50000">50,000</option>
                    <option value="100000">100,000</option>
                    <option value="200000">200,000</option>
                    <option value="300000">300,000</option>
                    <option value="400000">400,000</option>
                    <option value="500000">500,000</option>
                    <option value="600000">600,000</option>
                    <option value="700000">700,000</option>
                    <option value="800000">800,000</option>
                    <option value="900000">900,000</option>
                    <option value="1000000">1,000,000</option>
                    <option value="2000000">2,000,000</option>
                  </select>
                </div>
              </li>
              <li class="nav-item dropdown">
                <input class="input-search align-self-stretch form-control btn btn-primary" type="submit" value="Search">
              </li>
              
            </ul>
          </nav>
        </form>
          <div class="collapse navbar-collapse" id="navbar-list-3">
            <ul class="navbar-nav">
              <li class="nav-item active"> <a class="nav-link" href="#">Trip search</a> </li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Destination </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="#">Nepal</a> <a class="dropdown-item" href="#">Bhutan</a> <a class="dropdown-item" href="#">India</a> <a class="dropdown-item" href="#">Multiple Countries</a> </div>
              </li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Duration </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="#">1 - 7 days</a> <a class="dropdown-item" href="#">8-12days</a> <a class="dropdown-item" href="#">12-18days</a> <a class="dropdown-item" href="#">18 - 21days</a> </div>
              </li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Seasons </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="#">Autumn</a> <a class="dropdown-item" href="#">Spring</a> <a class="dropdown-item" href="#">Winter</a> <a class="dropdown-item" href="#">Summer</a> </div>
              </li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Activities </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="#">Trek</a> <a class="dropdown-item" href="#">Tour</a> <a class="dropdown-item" href="#">Peak Climbing</a> <a class="dropdown-item" href="#">Adventure Activities</a> </div>
              </li>
            </ul>
          </div> 
        </nav>
      </div>
    </div>
  </section>
  <section class="welcome_section section_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8 fadeInLeft animatable">
          <div class="detail">
            <h2>{{ $about->title }}</h2>
            <p>{!! $about->description !!}</p>
          </div>
        </div>
   

        <?php
use App\PackageType;
$packagetype = PackageType::get();
?>

        <div class="col-md-4 col-sm-4 fadeInRight animatable">
          <div class="detail">
            <h3>Packages Type</h3>
            <ul>
              @foreach($packagetype as $packagetypes)
              <li><a href="{{ route('page','packages') }}">{{ $packagetypes->package_type }}</a></li>
              @endforeach
            </ul>
            {{-- <div class="mt-3"> <a href="detail-page.html" class="btn btn-success view_btn text-white" >View more</a> </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="specialities_content carousel-wrap">
    <div class="container">
      <div class="row">
        <div class="offset-md-2 col-md-8">
          <h2 class="section_title border center">Our Specialities</h2>
          <div class="owl-carousel owl-theme">
            @forelse($package as $data)
            <div class="item"> <a href="{{ route('package.detail', $data->id) }}"><img src="{{ asset($data->image) }}"></a> </div>
            @empty
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="deal-section">
    <div class="container">
      <div class="row">
        <div class="offset-md-2 col-md-8">
          <div class="row deal-content">
            <div class="col-md-12">
              <h2 class="section_title border center text-white"> Deals & Dicount </h2>
            </div>
            @forelse($package as $data)
            <div class="col col-md-4 col-sm-4 col-6 mb-5 fadeInDown animatable"> <a href="{{ route('package.detail', $data->id) }}">
              <figure class="expedition_img"> <img src="{{ asset($data->image)}}">
                <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </span> <span class="reviews-count">(5)</span> </div>
                <div class="price_box circle_box"> <span>From {{ $data->price }}</span> </div>
              </figure>
              </a>
              <figcaption class="expedition_caption">
                <div class="expedition_wrapper">
                  <h4>{{ $data->title }}</h4>
                  <p>{!! $data->description !!}</p>
                </div>
              </figcaption>
            </div>
            @empty
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="destination-section mt-5 tour-destination">
    <div class="container">
      <h2 class="section_title border center"> Tour Destination</h2>
      <div class="row special_package">
        @forelse($project as $data)
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item pulse animatable">
          <div class="single_package"> <a href="{{ route('project.detail', $data->id) }}">
            <figure class="pkg-img"> <span class="price-box">{{ $data->price }}/person</span> <img src="{{ asset($data->image)}}">
              <div class="box_caption">
                <h3>{{ $data->name }}</h3>
              </div>
            </figure>
            </a>
            <figcaption class="expedition_caption">
              <div class="expedition_wrapper"> 
                <!-- <h4 class="collection">Collection</h4>-->
                <h4 class="pkg-title">{{ $data->title }}</h4>
                <p>{{ $data->sub_title }}</p>
                <!--<div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>--> 
                <!--<span class="pkg-price">From $49</span> --> 
              </div>
            </figcaption>
          </div>
        </div>
        @empty
        @endforelse
      </div>
    </div>
  </section>
  <section class="destination-section select-destination carousel-wrap mt-0">
    <div class="container">
      <h2 class="section_title border center text-white"> Select Your Destination</h2>
      <div class="row">
        <div class="offset-md-2 col-md-8">
          <div class="owl-carousel owl-theme">
            @forelse($project as $data)
            <div class="single_package"> <a href="{{ route('project.detail', $data->id) }}">
              <figure class="pkg-img"> <span class="price-box">{{ $data->place }}</span> <img src="{{ asset($data->image)}}"> 
                <!--<div class="box_caption">
                  <h3>Everest B.C &amp; Gokyo Lakes</h3>
                </div>--> 
                
              </figure>
              </a>
              <figcaption class="expedition_caption">
                <div class="expedition_wrapper">
                  <h4 class="collection">Collection</h4>
                  <h4 class="pkg-title">{{ $data->title }}</h4>
                  <p>{{ $data->sub_title }}</p>
                  <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>
                  <span class="pkg-price">From {{ $data->price }}</span> </div>
              </figcaption>
            </div>
            @empty
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="trip_wrapper my-5">
    <div class="container">
      <h2 class="section_title border center">Best selling trips</h2>
      <div class="tab-bar"><!-- ./tab-bar starts-->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Nepal Tour</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Nepal Treeking</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Adventure Activities</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Outbound Tour</a> </li>
        </ul>
        <div class="tab-content mt-3">
          <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <div class="row special_package">
              @forelse($tourproject as $data)
              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item pulse animatable">
                <div class="single_package"> <a href="{{ route('project.detail', $data->id) }}">
                  <figure class="pkg-img"> <span class="price-box">{{ $data->price }}/person</span> <img src="{{ asset($data->image) }}"> 
                    <!--<div class="box_caption">
                    <h3>Everest B.C &amp; Gokyo Lakes</h3>
                  </div>--> 
                    
                  </figure>
                  </a>
                  <figcaption class="expedition_caption">
                    <div class="expedition_wrapper">
                      <h4 class="collection">Collection</h4>
                      <h4 class="pkg-title">{{ $data->title }}</h4>
                      <p>{{ $data->sub_title }}</p>
                      <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>
                      <span class="pkg-price">From/{{ $data->price }}</span> </div>
                  </figcaption>
                </div>
              </div>
               @empty
               @endforelse
            </div>
          </div>
          <div class="tab-pane" id="tabs-2" role="tabpanel">
            <div class="row special_package">
              @forelse($treakingproject as $data)
              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item pulse animatable">
                <div class="single_package"> <a href="{{ route('project.detail', $data->id) }}">
                  <figure class="pkg-img"> <span class="price-box">{{ $data->price }}/person</span> <img src="{{ asset($data->image) }}"> 
                    <!--<div class="box_caption">
                    <h3>Everest B.C &amp; Gokyo Lakes</h3>
                  </div>--> 
                    
                  </figure>
                  </a>
                  <figcaption class="expedition_caption">
                    <div class="expedition_wrapper">
                      <h4 class="collection">Collection</h4>
                      <h4 class="pkg-title">{{ $data->title }}</h4>
                      <p>{{ $data->sub_title }}</p>
                      <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>
                      <span class="pkg-price">From/{{ $data->price }}</span> </div>
                  </figcaption>
                </div>
              </div>
              @empty
            @endforelse
            </div>
          </div>
          <div class="tab-pane" id="tabs-3" role="tabpanel">
            <div class="row special_package">
              @forelse($adventureproject as $data)
              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item pulse animatable">
                <div class="single_package"> <a href="{{ route('project.detail', $data->id) }}">
                  <figure class="pkg-img"> <span class="price-box">{{ $data->price }}/person</span> <img src="{{ asset($data->image) }}"> 
                    <!--<div class="box_caption">
                    <h3>Everest B.C &amp; Gokyo Lakes</h3>
                  </div>--> 
                    
                  </figure>
                  </a>
                  <figcaption class="expedition_caption">
                    <div class="expedition_wrapper">
                      <h4 class="collection">Collection</h4>
                      <h4 class="pkg-title">{{ $data->title }}</h4>
                      <p>{{ $data->sub_title }}</p>
                      <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>
                      <span class="pkg-price">From/{{ $data->price }}</span> </div>
                  </figcaption>
                </div>
              </div>
              @empty
              @endforelse
            </div>
          </div>
          <div class="tab-pane" id="tabs-4" role="tabpanel">
            <div class="row special_package">
              @forelse($outproject as $data)
              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item pulse animatable">
                <div class="single_package"> <a href="{{ route('project.detail', $data->id) }}">
                  <figure class="pkg-img"> <span class="price-box">{{ $data->price }}/person</span> <img src="{{ asset($data->image) }}"> 
                    <!--<div class="box_caption">
                    <h3>Everest B.C &amp; Gokyo Lakes</h3>
                  </div>--> 
                    
                  </figure>
                  </a>
                  <figcaption class="expedition_caption">
                    <div class="expedition_wrapper">
                      <h4 class="collection">Collection</h4>
                      <h4 class="pkg-title">{{ $data->title }}</h4>
                      <p>{{ $data->sub_title }}</p>
                      <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>
                      <span class="pkg-price">From/{{ $data->price }}</span> </div>
                  </figcaption>
                </div>
              </div>
              @empty
              @endforelse
            </div>
          </div>
        </div>
        <!--//tab-content ends-->
        {{-- <div class="btn_center btn-flex mb-5 no"> <a href="detail-page.html" class="btn view_btn btn-danger">View all Trips <i class="fa fa-angle-double-right"></i></a> </div> --}}
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
            <div class="item "> <a href="#">
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