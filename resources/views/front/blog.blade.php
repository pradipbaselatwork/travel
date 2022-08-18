@extends('layouts.front_layout.front_layout')
@section('content')
<?php
use App\Comment;
use App\Testimonial;
$comments = Comment::get();
$testimonial = Testimonial::get();

?>
<section class="billboard inner-page">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay">
       
          <div class="card-caption text-white">
           <div class="container">
            <div class="pulse animatable">
              <div class="breadCrumbNav">
                <div class="container breadcrumb-container">
                  <h1 class="breadCrumb_title"> Blog</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="index.html" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Blog</span></li>
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
  <section class="welcome_section section_wrapper blog_content">
    <div class="container">
      <h2 class="section_title border center">Blog</h2>
      <div class="row">
        <div class="col col-sm-8">
          @forelse($blog as $data)
          <div class="blog_wrapper">
            <figure class="blog_thumb"> <img src="{{ asset($data->image) }}"> </figure>
            <figcaption class="blog_caption">
              <h4 class="blog_title">{{$data->title}}</h4>
              <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$data->title}}</span>
              <p class="blog_detail">{!! $data->description !!}</p>
              <a href="#" class="btn blog_btn">Read More</a> </figcaption>
          </div>
  @empty
            @endforelse
        </div>
        <div class="col col-sm-4">
          <div class="form_search mb-4">
            <form role="form">
              <input class="form-control" id="search-field" placeholder="Search ..." type="search">
              <button type="button" class="btn btn-search search-submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
            </form>
            <div class="clear"></div>
          </div>
          <aside class="blog_side">
            <h4 class="post_title">Popular Posts</h4>
            <article>
              <figure class="blog_side_img"> <img src="{{ asset('front/images/post1.png') }}" alt="" title=""> </figure>
              <figcaption class="blog_side_caption"> Nemo enim ipsam voluptatem quia <span class="time">24 Feb 2019</span> <a href="#">Continue Reading</a> </figcaption>
            </article>
            <article>
              <figure class="blog_side_img"> <img src="{{ asset('front/images/post1.png') }}" alt="" title=""> </figure>
              <figcaption class="blog_side_caption"> Nemo enim ipsam voluptatem quia <span class="time">24 Feb 2019</span> <a href="#">Continue Reading</a> </figcaption>
            </article>
            <article>
              <figure class="blog_side_img"> <img src="{{ asset('front/images/post1.png') }}" alt="" title=""> </figure>
              <figcaption class="blog_side_caption"> Nemo enim ipsam voluptatem quia <span class="time">24 Feb 2019</span> <a href="#">Continue Reading</a> </figcaption>
            </article>
            <h4 class="post_title">Archives</h4>
            <div class="side_archives">
              <ul>
                <li><a href="#">October 2019</a></li>
                <li><a href="#">September 2019</a></li>
                <li><a href="#">August 2019</a></li>
                <li><a href="#">July 2019</a></li>
                <li><a href="#">June 2019</a></li>
                <li><a href="#">May 2019</a></li>
              </ul>
            </div>
          </aside>
        </div>
      </div>
      <h2 class="section_title">Reviews</h2>
      <div class="tour-review rating-static"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>
      <div class="review_form">
        <form role="form" action="{{ route('comment') }}" method="post">
          @csrf
          <div class="row">
            <div class="col col-sm-12">
              <div class="form-group">
                <textarea id="review" name="message" class="form-control" rows="5" placeholder="Write a review..."></textarea>
              </div>
            </div>
            <div class="col col-sm-12">
              <div class="form-group">
                <div class="captcha">
                  <div class="spinner">
                    <label>
                      <input type="checkbox" onclick="$(this).attr('disabled','disabled');">
                      <span class="checkmark"><span>&nbsp;</span></span> </label>
                  </div>
                  <div class="text"> I'm not a robot </div>
                  <div class="logo"> <img src="https://forum.nox.tv/core/index.php?media/9-recaptcha-png/"/>
                    <p>reCAPTCHA</p>
                    <small>Privacy - Terms</small> </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <button class="btn submit-btn" type="submit" value="Submit">Submit</button>
            </div>
          </div>
        </form>
        {{-- <div class="form-group">
          <button class="btn submit-btn" type="submit" value="Submit">Submit</button>
        </div> --}}
        <div class="body_comment">
          <ul id="list_comment" class="col-12">
            
            <!-- Start List Comment 1 -->
            @forelse($comments as $data)
            <li class="box_result">
              <div class="avatar_comment"> <img src="{{ asset('front/images/avatar.jpg') }}" alt="avatar"/> </div>
              <div class="result_comment">
                <h4>Nath Ryuzaki</h4>
                <div class="tour-review rating-static"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">({{ $data->rating }})</span> </div>
                <p>{{ $data->message }}</p>
                <div class="tools_comment"> <a class="like" href="#">Like</a> <!--<a class="replay" href="#">Reply</a>--> <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span> <span class="comment-time">5m ago</span> </div>
              </div>
            </li>
            @empty
            @endforelse
          </ul>
          <div class="col-12">
            <button class="show_more_btn btn" type="button">VIEW MORE COMMENTS</button>
          </div>
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