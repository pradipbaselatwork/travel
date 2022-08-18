@extends('layouts.front_layout.front_layout')
@section('content')  
<section class="billboard inner-page">
    <div class="bg-card">
      <div class="bg-card-img-overlay">
          <div class="card-caption text-white">
           <div class="container">
            <div class="pulse animatable">
              <div class="breadCrumbNav">
                <div class="container breadcrumb-container">
                  <h1 class="breadCrumb_title">Checkout</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="index.html" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Checkout</span></li>
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
   
  <section class="cart_content mt-3">
   
        <div class="shopping-cart container">
         <h1 class="section_title border center">Checkout</h1>         
   <div class="user-account checkout-details">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="new-users">
              <form id="billing_form" role="form" action="{{ route('checkout') }}" method="post">
                @csrf
                <h2>Billing Address</h2>
                <div class="fieldset">
                  <p>
                    <label>First Name * :</label>
                    <input id="" type="text" value="{{ auth()->user()->name }}" name="name" class="form-control">
                  </p>
                  <p>
                    <label>Email * :</label>
                    <input id="" type="email" value="{{ auth()->user()->email }}" name="email" class="form-control" readonly>
                  </p>
                  <p>
                    <label>Address * :</label>
                    <input id="" type="text" value="{{ auth()->user()->address }}" name="address" class="form-control">
                  </p>
                  <p>
                    <label>City * :</label>
                    <input id="" type="text" value="city" name="city" class="form-control">
                  </p>
                  <p>
                 <label for="state">Country * :</label>
                                  <select name="country" class="form-control" id="country">
                                    <option >Select</option>
                                    @foreach ($countries as $country)
                      <option value="{{$country->nicename}}" @if(!empty(auth()->user()->country) && auth()->user()->country == $country->nicename) selected="" @endif>{{$country->nicename}}</option> @endforeach
               </select>
                  </p>
                  <p>
                    <label>Phone Number :</label>
                    <input id="" type="text" value="{{ auth()->user()->phone }}" name="phone" class="form-control">
                  </p>

                  <p>
                    <input class="btn-submit btn" type="submit" value="Submit">
                  </p>

                </div>
              </form>
            </div>
          </div>
           
        </div>
      </div>
          
        </div>
   
  </section>
   
  <div class="clear pt-3"></div>

@endsection