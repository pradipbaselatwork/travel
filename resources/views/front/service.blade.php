@extends('layouts.front_layout.front_layout')
@section('content')
<?php
use App\ServiceInfo;
$serviceInfo = ServiceInfo::first();

?>
<section class="billboard inner-page">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay">
        
          <div class="card-caption text-white">
          <div class="container">
            <div class="pulse animatable">
              <div class="breadCrumbNav">
                <div class="container breadcrumb-container">
                  <h1 class="breadCrumb_title">{{ $serviceInfo->title }}</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Services</span></li>
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
      <figure class="welcome_thumb pull-right w-50 ml-3"><img src="images/bac2.jpg" alt=""></figure>
      <figcaption class="detail txt_wrapper">
        <h1 class="section_heading">Services</h1>
   <p>{!! $serviceInfo->description !!}</p>
      </figcaption>
    </div>
  </section>
  <section class="trip_wrapper service-content">
    <div class="container">
      <h2 class="section_title border center">Our Services</h2>
      <div class="row special_package">
        @forelse($service as $data)
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item pulse animatable">
          <div class="single_package"> <a href="{{ route('service.detail', $data->id) }}">
            <figure class="pkg-img"> <span class="price-box">{{ $data->price }}/person</span> <img src="{{ asset($data->image) }}"> 
              <!--<div class="box_caption">
                    <h3>Everest B.C &amp; Gokyo Lakes</h3>
                  </div>--> 
              
            </figure>
            </a>
            <figcaption class="expedition_caption">
              <div class="expedition_wrapper">
                <h4 class="collection">{{ $data->title }}</h4>
                <h4 class="pkg-title">{{ $data->sub_title }}</h4>
                <p>Precise planning with first-hand knowledge defining our high success rate</p>
                <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>
                <span class="pkg-price">From {{ $data->price }}</span> </div>
            </figcaption>
          </div>
        </div>
        @empty
        @endforelse
      </div>
    </div>

    <div class="container">
      <div class="booking_form" id="booking">
        <form role="form" action="{{ route('about.us.contact') }}" method="post">@csrf
          <div class="row">
           
              @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
           
            <div class="col col-12">
              <h4 class="form_title bold">Booking Information :</h4>
            </div>
        
            
            <div class="clear"></div>
       
              <div class="form-group col col-sm-6">
                <label for="name">Name * :</label>
                <input id="name" class="form-control" type="text" name="name">
              </div>
         
          
              <div class="form-group col col-sm-6">
                <label for="email">Email * :</label>
                <input id="email" class="form-control" type="email" name="email">
              </div>
           
         
              <div class="form-group col col-sm-6">
                <label for="phone">phone * :</label>
                <input id="phone" class="form-control" type="tel" name="phone">
              </div>
        
        
              <div class="form-group col col-sm-6">
                <label for="address">Address*  :</label>
                <input id="address" class="form-control" type="text" name="address">
              </div>
        
      
              <div class="form-group col col-sm-">
                <label for="sex">Sex * </label>
                <select id="sex" class="form-control" name="sex" required="">
                  <option name="sex" value="male">Male</option>
                  <option  name="sex" value="female">Female</option>
                </select>
              </div>
          
     
              <div class="form-group col col-sm-6">
                <label for="age">Age * </label>
                <select id="age" class="form-control" name="age" required="">
                  <option name="age" value="less_than_1">Less than 1</option>
                  <option name="age" value="less_than_5">Less than 5</option>
                </select>
              </div>
   
           
            <div class="col-12">
              <h4 class="form_title bold">Schedule Information :</h4>
            </div>
            
     
              <div class="form-group col col-sm-6">
                <label for="booking_date">Booking date:</label>
                <div id="select_date">
                <input id="date" class="form-control" type="date" name="booking_date">
                </div>
              </div>

                <div class="form-group col col-sm-6">
                            <label for="pax">No. of Pax : * </label>
                            <div class="select_dropdown">
                              <select id="pax" class="form-control" name="pax" required="">
                                
                    <option name="pax" value="1" selected="">1</option>
                    <option  name="pax" value="2">2</option>
                    <option name="pax"  value="3">3</option>
                    <option name="pax" value="4">4</option>
                    <option name="pax" value="5">5</option>
                    <option name="pax" value="6">6</option>
                              </select>
                          </div>
                          </div>

          <div class="form-group col col-sm-6">
            <label for="country">Country of Residence: *</label>
          <div class="select_dropdown">
        <select id="country" class="form-control" name="country" required="">                                 
            <option name="country"  value="" selected>Select Country...</option>
            <option name="country"  value="Australia">Australia</option>
            <option name="country"  value="Canada">Canada</option>
        </select>
                            
                            </div>
                          </div>
      
      
         <div class="form-group col col-sm-6">
                <label for="date">Desired Trip Details :</label>
                <div class="select_dropdown">
                              <select id="trip" class="form-control" name="trip" required="">
                                
              <option name="trip" value="Activity: Trekking" selected="">
                  Activity: Trekking </option>
              <option name="trip" value="Region: Everest Region">
                  Region: Everest Region</option>
              <option name="trip" value="Itinerary: Everest Base Camp trek ">
                  Itinerary: Everest Base Camp trek 
              </option>

                   </select>
                   </div>
              </div>   
          
              <div class="form-group col col-12">
                <label for="message">Other Details & Requirements of the Trip: </label>
                <textarea name="description" id="message" rows="5" class="form-control" name="details" placeholder="Details & Requirements..."></textarea>
              </div>
            
          
              <div class="form-group col col-12">
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
           
            
              <div class="form-group col col-12">
                <input type="submit" class="btn btn_submit btn-danger" value="Book now" value="Submit">
              </div>
          
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection