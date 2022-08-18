@extends('layouts.front_layout.front_layout')
@section('content')
<?php
use App\Testimonial;
use App\Project;
$testimonial = Testimonial::get();
$tourproject= Project::limit(4)->get();
$treakingproject= Project::limit(3)->get();
$adventureproject= Project::limit(4)->get();
$outproject= Project::limit(3)->get();

?>
<section class="billboard inner-page">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay">
        
          <div class="card-caption text-white">
          <div class="container">
            <div class="pulse animatable">
              <div class="breadCrumbNav">
                <div class="container breadcrumb-container">
                  <h1 class="breadCrumb_title">Packages</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="index.html" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Nepal Tour Packages</span></li>
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
  <section class="specialities_content pack_content carousel-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="section_title border center mb-0">Our Packages </h2>
          <h4 class="text-center">Find the Best Selling Packages and experience the most of Nepal with your loved ones!</h4>
          <div class="owl-carousel owl-theme pt-3">
            @forelse($getpackage as $data)
            <div class="item"> <a href="{{ route('package.detail', $data->id) }}"><img src="{{ asset($data->image) }}"></a> </div>
        @empty
        @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="destination-section  tour-destination package-section">
    <div class="container">

      @forelse($package as $data)
      <div class="row special_package">
        <div class="col-12 pb-3">
          <h2 class="section_title border center mb-0"> {{ $data->package_type }} </h2>
          <h4 class="text-center">Find the Best Selling Packages and experience the most of Nepal with your loved ones!</h4>
        </div>
        @foreach ($data->package as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item pulse animatable">
          <div class="single_package"> <a href="{{ route('package.detail', $item->id) }}">
            <figure class="expedition_img"> <img src="{{ asset($item->image) }}">
              <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </span> <span class="reviews-count">(5)</span> </div>
              <div class="price_box circle_box"> <span>From {{ $item->price }}</span> </div>
            </figure>
            </a>
            <figcaption class="expedition_caption">
              <div class="expedition_wrapper">
                <h4>{{ $item->title }}</h4>
                <p>Precise planning with first-hand knowledge defining our high success rate</p>
              </div>
            </figcaption>
          </div>
        
        </div>
        @endforeach
      </div>
      @empty
      @endforelse
      <div class="pagination"><!--//pagination-->
        <ul>
          <li> <a href="#" class="page_link"><i class="fa-solid fa-arrow-left"></i></a></li>
          {{-- <li> <span class="current">1</span></li> --}}
          <li> <a href="#">{{ $package->links() }}</a></li>
          {{-- <li> <a href="#">3</a></li>
          <li> <a href="#">4</a></li>
          <li> <a href="#">5</a></li>
          <li> <a href="#">6</a></li> --}}
          <li> <a href="#" class="page_link"><i class="fa-solid fa-arrow-right"></i></a></li>
        </ul>
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
                <div class="single_package"> <a href="detail-page.html">
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
                <div class="single_package"> <a href="detail-page.html">
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
                <div class="single_package"> <a href="detail-page.html">
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
                <div class="single_package"> <a href="detail-page.html">
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
        <div class="btn_center btn-flex mb-5 no"> <a href="detail-page.html" class="btn view_btn btn-danger">View all Trips <i class="fa fa-angle-double-right"></i></a> </div>
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
  
  