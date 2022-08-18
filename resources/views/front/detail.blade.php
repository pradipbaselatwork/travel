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
                  <h1 class="breadCrumb_title"> Detail Page</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Detail Page</span></li>
        
    
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
  @if ($errors->any())
  <div class="alert alert-danger" style="margin-top: 10px">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  @if(Session::has('error_message'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
   {{ Session::get('error_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('success_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
      {{ Session::get('success_message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <section class="welcome_section section_wrapper detail-page-content">
    <div class="container">
    

              <figure class="col-img-50 thumbnail-img  w-50"><img src="{{ $package->image }}" alt=""></figure>
              
          <figcaption class="detail">
            {{-- <h3 class="section_heading">Everest B.C & Gokyo Lakes</h3> --}}
            <!-- <h2>Tenzo Hotel</h2>-->
           <!-- <h4>Tenzo Hotel is a place to enjoy above the clouds, dense forests, beautiful view of sunset and panoramic view of entire Kathmandu valley at the same time.</h4>-->
            <p>{!! $package->description !!}</p>
       </figcaption>
   <div class="clear"></div>
    
                    {{-- <figure class="col-img-50 thumbnail-img w-50"><img src="{{ $package->image_1 }}" alt=""></figure> --}}
{{--               
           <figcaption class="detail"> --}}
            {{-- <h3 class="section_heading">Everest B.C & Gokyo Lakes</h3> --}}
            <!-- <h2>Tenzo Hotel</h2>-->
            <!--<h4>Tenzo Hotel is a place to enjoy above the clouds, dense forests, beautiful view of sunset and panoramic view of entire Kathmandu valley at the same time.</h4>-->
            {{-- <p>{!! $package->textarea_1 !!}</p>       </figcaption>
    <div class="clear"></div>
                      <figure class="col-img-50 thumbnail-img w-50"><img src="{{ $package->image_2}}" alt=""></figure>
              
         <figcaption class="detail"> --}}
            {{-- <h3 class="section_heading">Everest B.C & Gokyo Lakes</h3> --}}
            <!-- <h2>Tenzo Hotel</h2>-->
          <!--  <h4>Tenzo Hotel is a place to enjoy above the clouds, dense forests, beautiful view of sunset and panoramic view of entire Kathmandu valley at the same time.</h4>-->
          {{-- <p>{!! $package->textarea_2 !!}</p>     </figcaption>
    <div class="clear"></div>   --}}

    <form action="{{ route('add.to.cart') }}" method="post">
      @csrf
      <input type="hidden" name="package_id" value="{{ $package->id }}">
      <input type="hidden" name="name" id="" value="{{ $package->title}}">
      <input type="hidden" name="image" id="" value="{{ $package->image}}">
      <input type="hidden" name="price" id="" value="100">
        <button class="btn btn-primary">
              Add to Cart
        </button>

      </form>
    </div>
  </section>
  <section class="intro-banner">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 text-center text-white">
          <h2>We Are Pacific A Travel Agency</h2>
          <p>We can manage your dream building A small river named Duden flows by their place</p>
          <p class="mb-0"><a href="#" class="btn btn-primary">Ask For A Quote</a></p>
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