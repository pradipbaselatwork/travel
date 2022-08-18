@extends('layouts.front_layout.front_layout')
@section('content')
<section class="breadCrumbNav-banner subpage-slider showcase">
    <figure> <img src="{{ asset('front/images/stock-photo-moscov-russia-city-1185773197.jpg') }}" alt=""> </figure>
    <div class="breadCrumbNav breadCrumboverlay">
      <div class="container breadcrumb-container">
        <div class="breadCrumbcaption">
          <h1 class="breadCrumb_title">User Account</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Account</span></li>
            </ul>
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

  <section class="subpage_section contact_section">
    <div class="container">
        
      
     
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">Update User Account</h2>
        <a href="{{ route('logout') }}"> <button type="" value="" class="btn btn-primary">Logout</button></a>

        {{-- <div class="col-md-6">
          <div class="login-register py-5">
            <a href="{{ route('logout') }}"> <button type="" value="" class="btn btn-primary">Logout</button></a>
          </div>
        </div> --}}
      </heading>
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
            <div class="row">
                
                <div class="col-md-6">
                    <div class="login-register py-5">
                        <div class="form">
                            <form role="form" class="register-form" action="{{ route('update.user.account') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="" class="form-control" readonly placeholder="email address" value="{{ auth()->user()->email }}"/>
                                    </div>
                                <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}"  placeholder="name"/>
                                </div>
        
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address"  value="{{ auth()->user()->address }}" placeholder="address"/>
                                    </div>
        
                                <div class="form-group">
                                    <input type="tel" name="phone" value="{{ auth()->user()->phone }}" class="form-control" placeholder="Mobile no"/>
                                    </div>
                                
                                
                                <button type="submit" value="submit" class="btn btn-primary">Update Details</button>
                                {{-- <p class="message">Already registered? <a href="#">Sign In</a></p> --}}
                            </form>
                        
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-register py-5">
                        <div class="form">
                            <form role="form" class="register-form" action="{{ route('update.user.password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                <input type="text" class="form-control" name="current_pwd" placeholder="Enter Current Password"/>
                                </div>
        
                                <div class="form-group">
                                    <input type="text" class="form-control" name="new_pwd" placeholder="Enter New Password"/>
                                    </div>
        
                                <div class="form-group">
                                    <input type="tel" name="confirm_pwd" class="form-control" placeholder="Enter Confirm Password"/>
                                    </div>
                                
                                
                                <button type="submit" value="submit" class="btn btn-primary">Update Password</button>
                                {{-- <p class="message">Already registered? <a href="#">Sign In</a></p> --}}
                            </form>
                        
                        </div>
                        
                    </div>
                </div>


             




            </div>
         
            
    </div>
     
  </section>
@endsection