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
        <h1 class="breadCrumb_title"> Contact us</h1>
        <div class="breadcumb-inner">
          <ul>
            <li><a href="index.html" class="breadCrumb_link">Home</a></li>
            <li><i class="fa fa-arrow-right-long"></i></li>
            <li><span>Contact us</span></li>
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

  @if(Session::has('success_message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
    {{ Session::get('success_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
  <section class="footer_section section_wrapper">
    <div class="container">
              <h2 class="section_title mb-3">CONTACT US</h2>
   
    
      <div class="row">
          <div class="col col-sm-5">
            <div class="contact_info">
  
              <address>
              <figure class="icon"><i class="fas fa-mobile-alt"></i></figure>
              <div class="details"> <span> <a href="tel:+977 01 4378381, 4378189" class="linkto">+977 01 xxxxxx, xxxxxx</a> </span> <span> <a href="tel:+977 98510 82775 (Nima)" class="linkto">+977 xxxxx xxxxx (Nima)</a> </span> </div>
              </address>
              <address>
              <figure class="icon"> <i class="fas fa-location-arrow"></i> </figure>
              <div class="details"> <span>Kathmandu - 29, Nepal </span> <span>Opposite to Kumari Bank, Nepal </span> </div>
              </address>
              <address>
              <figure class="icon"><i class="far fa-envelope"></i> </figure>
              <div class="details"> <span> <a href="mailto:info@demomail.com" class="linkto">info@demomail.com</a> </span> </div>
              </address>
            </div>
          </div>
          <div class="col col-sm-7">
            <div class="contact_form">
              <form role="form" class="footer-form" action="{{ route('contact') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col col-6 form-group">
                    <input id="name" name="name" class="form-control" type="text" placeholder="Name:" title="Type your full name" required>
                  </div>
                  <div class="col-6 form-group">
                    <input id="phone" name="phone" class="form-control" type="tel" placeholder="Phone:" title="Type your pnone no" required>
                  </div>
                  <div class="col col-12 form-group">
                    <input id="email" name="email" class="form-control" type="email" placeholder="E-Mail:" title="Type your email" required>
                  </div>
                  <div class="col col-12 form-group">
                    <textarea id="message" name="description" class="form-control"  placeholder="Message..." title="Type your message" rows="5" required></textarea>
                  </div>
                  <div class="col col-12 form-group">
                    <p>
                      <input class="btn-submit btn" type="submit" value="Submit">
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </section>
   
   <section class="map">
              <div class="gmap_canvas">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d56495.64517973742!2d85.347558!3d27.74883!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d341ca83fdc2218!2sHimalayan+Hikers+Expedition!5e0!3m2!1sen!2sus!4v1554464870899!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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