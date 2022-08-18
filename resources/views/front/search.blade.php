@extends('layouts.front_layout.front_layout')
@section('content')
<h1><section class="billboard inner-page">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay">
        
          <div class="card-caption text-white">
          <div class="container">
            <div class="pulse animatable">
              <div class="breadCrumbNav">
                <div class="container breadcrumb-container">
                  <h1 class="breadCrumb_title">Search Packages</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Search Packages</span></li>
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
   
  <section class="trip_wrapper service-content">
    <div class="container">
      <h2 class="section_title border center">Searched Packages</h2>
      
      <div class="row">
      <div class="col-sm-3">
          <aside class="filter_category_sidebar">
            <div class="filter_category_wrapper">
                                        <input type="hidden" name="" id="category" value="{{ $category }}">
              <h2 class="filter-title">Filter</h2>
              <label class="label_title" for="price">Price:</label>
              <div class="filter_item form-group price_filter" id="average">
                <input type="text" class="form-control" placeholder="Min" size="1" value=""  maxlength="" minlength="" id="price">
                <input type="text" class="form-control" placeholder="Max" size="2" value=""  maxlength="" minlength="" id="price">
                <button type="button" role="button" class="btn btn-go"> Go </button>
              </div>
                  {{-- </form> --}}
          {{-- <span id="ajaxAverage">
            @include('front.ajaxAverage')
          </span> --}}
              <div class="filter_item form-group location_filter">
                <label class="label_title" for="location">Choose Location:</label>
                <input type="text" class="form-control autocomplete" placeholder="Location" id="location">
              </div>
              <div class="filter_item form-group negotiable_filter">
                <label class="label_title" for="price">Difficulty Status:</label>
                <label>
                  <input type="radio" value="Yes"  name="p-neg" id="price">
                  <span>Hard</span> </label>
                <label>
                  <input type="radio" value="No" name="p-neg"   id="price">
                  <span>Normal</span> </label>
                <label>
                  <input type="radio" value="Fixed Price" name="p-neg" id="price">
                  <span>Easy</span> </label>
              </div>
              <div class="filter_item form-group date_filter">
                <label class="label_title" for="date">Date:</label>
                <input type="date" class="form-control" name="date" id="date">
              </div>
              {{-- <div class="filter_item form-group type_filter">
                <label class="label_title" for="room">Types</label>
                <div class="select_dropdown">
                  <select class="form-control" name="tour-types" id="room">
                    <option value="Business">Business</option>
                    <option value="Economy"  selected="selected">Economy</option>
                    <option value="VIP" >VIP</option>
                    <option value="Family">Family</option>
                  </select>
                </div>
              </div> --}}
            </div>
          </aside>
        </div>
   
      
      
      
          <div class="col-sm-9">
          
          {{-- <form action="" method="" name="sortPackages" id="sortPackages"> --}}
            <input type="hidden" name="" id="category" value="{{ $category }}">
          <div class="filter_item form-group filter_sort">
              <label class="label_title" for="sort_by">Sort by</label>
              <div class="select_dropdown">
                <select class="form-control" class="sort" name="sort-type" id="sort">
                  <option value="">Select</option>
                  <option value="low_to_high">Price: Low to High</option>
                  <option value="high_to_low">Price: High to Low</option>
                  {{-- <option value="ascending"> Name: Ascending</option>
                  <option value="descending"> Name: Descending</option>
                  <option value="most-visited"> Most Visited </option> --}}
                </select>
              </div>
            </div>
          {{-- </form> --}}
          <span id="ajaxPackage">
            @include('front.ajaxPackage')
          </span>
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
  </section></h1>
@endsection