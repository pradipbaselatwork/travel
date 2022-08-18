@extends('layouts.front_layout.front_layout')
@section('content')
<section class="billboard inner-page">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay">
       
          <div class="card-caption text-white">
           <div class="container">
            <div class="pulse animatable">
              <div class="breadCrumbNav">
                <div class="container breadcrumb-container">
                  <h1 class="breadCrumb_title">Projects</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="index.html" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Projects</span></li>
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
  
  <section class="destination-section  tour-destination project-content mt-5">
    <div class="container">
      <div class="row special_package">
        <div class="col-12 pb-3">
          <h2 class="section_title border center mb-0">Our Projects </h2>
          <h4 class="text-center">Find the Best Selling Packages and experience the most of Nepal with your loved ones!</h4>
        </div>
        @forelse($project as $data)
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item pulse animatable">
        
          <div class="single_package"> <a href="{{ route('project.detail', $data->id) }}">
            <figure class="pkg-img"> <span class="price-box">{{ $data->price }}/person</span> <img src="{{ asset($data->image) }}">
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
      <div class="pagination"><!--//pagination-->
        <ul>
          <li> <a href="#" class="page_link"><i class="fa-solid fa-arrow-left"></i></a></li>
          {{-- <li> <a href="#">3</a></li> --}}

          <li> <a href="#">{{ $project->links() }}</a></li>
      
          <li> <a href="#" class="page_link"><i class="fa-solid fa-arrow-right"></i></a></li>
        </ul>
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