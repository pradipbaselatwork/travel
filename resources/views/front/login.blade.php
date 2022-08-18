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
                  <h1 class="breadCrumb_title"> Login</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Login</span></li>
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
    <div class="container">    @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    
@if ($errors->any())
<div class="alert alert-danger">
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
          
    <div class="booking_form" id="booking">
        <form role="form" method="post" action="{{route('login')}}">
          @csrf
          <div class="row">
          
            <div class="col col-12">
              <h4 class="form_title bold">Booking Information :</h4>
            </div>
            
            <div class="clear"></div>
       
              {{-- <div class="form-group col col-sm-12">
                <label for="name">Name * :</label>
                <input id="name" class="form-control" type="text" name="name">
              </div> --}}
         
          
              <div class="form-group col col-sm-12">
                <label for="email">Email * :</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="email"/>
              </div>
           
         
              {{-- <div class="form-group col col-sm-12">
                <label for="phone">phone * :</label>
                <input id="phone" class="form-control" type="tel" name="telephone">
              </div> --}}
        
        
              <div class="form-group col col-sm-12">
                <label for="address">Password*  :</label>
                <input id="address" class="form-control" type="password" name="password"  placeholder="password">
              </div>
        
      
              
          
              <div class="form-group col col-12">
                <input type="submit" class="btn btn_submit btn-danger" value="login">
                <p class="message">Not registered? <a href="{{ route('register') }}">Create an account</a></p>
              </div>
          
          </div>
        </form>
      </div>
      
  </div>
</section>



@endsection