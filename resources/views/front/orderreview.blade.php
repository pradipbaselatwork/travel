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
                  <h1 class="breadCrumb_title">Order Review</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="index.html" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Order Review</span></li>
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
     <h1 class="section_title border center">Order Review</h1>
     @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
          {{ Session::get('success_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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
    
      <table class="cart_table">
        <thead class="column-labels">
          <tr>
            <th><label class="product-serial">SN</label></th>
            <th><label class="product-image">Image</label></th>
            <th><label class="product-details">Product</label></th>
            <th><label class="product-price">Price</label></th>

            <th><label class="product-line-price">Total</label></th>
          </tr>
        </thead>
        <?php 

        $subtotal = 0;
        ?>
        <tbody class="product">
            @forelse($cart as $data)
          <tr>
            <td>{{$data->id}}.</td>
            <td><img src="{{asset($data->image)}}" style="width: 100px; height:80px;" alt="" title="" style=""></td>
            <td><div class="product-details">
                <div class="product-title">{{$data->name}}</div>
                <p class="product-description">{{$data->description}}</p>
              </div></td>
            <td><div class="product-price">{{$data->price}}</div></td>
            <td><div class="product-line-price">{{$data->price}}</div></td>
          </tr>  

          <?php $subtotal =$subtotal+$data->price?>
          @empty
          <p>No Data</p>
          @endforelse
        </tbody>
      </table>
      <div class="totals">
        <div class="totals-item">
          <label>Subtotal</label>
          <div class="totals-value" id="cart-subtotal">{{ $subtotal }}</div>
        </div>
        <div class="totals-item">
          <label>Tax (0%)</label>
          <div class="totals-value" id="cart-tax">0.0</div>
        </div>
        <div class="totals-item totals-item-total">
          <label>Grand Total</label>
          <div class="totals-value" id="cart-total">{{ $subtotal }}</div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info  mt-3">
              <div class="panel-heading">
                <h4 class="panel-title">Payment Methods</h4>
              </div>
              <div class="pay__option tooltip-item">
                <form action="{{ route('placeorder') }}" method="post">@csrf
               <p id="paymentmessage"></p>
                <label for="cod">
                <input type="radio" class="getpaymentmethod" name="payment_method" value="Cash on delivery" required="">
                <a href="#"><span tooltip="Cash on delivery" id="payment" flow="up"><img src="{{ asset('front/images/cash_on_delivery.png') }}" alt=""></span></a> </label>
              <label for="khalti">
                <input type="radio" class="getpaymentmethod" name="payment_method" value="khalti" required="">
                <a href="#"><span tooltip="Khalti" flow="up" id="payment" ><img src="{{ asset('front/images/khalti.jpg') }}" alt=""></span></a> </label>
              <label for="esewa">
                <input type="radio" class="getpaymentmethod" name="payment_method" value="esewa" required="">
                <a href="#"><span tooltip="esewa" flow="up" id="payment"><img src="{{ asset('front/images/esewa.jpg') }}" alt=""></span></a> </label>
              <label for="phonepay">
                <input type="radio" class="getpaymentmethod" name="payment_method"  value="phonepay" required="">
                <a href="#"><span tooltip="phonepay" flow="up" id="payment"><img src="{{ asset('front/images/phonepay.jpg') }}" alt=""></span></a> </label>
                <br>
                
            <div class="form-check">
      <input type="checkbox" id="" onclick="enable()" name="checkbox" value="Yes">
      <label class="form-check-label" style="display: inline-block;" for="flexCheckDefault">
         <div> I accept <a href=""><b>terms and condition</b></a> & <a href=""><b>privacy policy</b></a> of Puja Garau.</div>
                      </label>
            </div>
        
               <div>
                <button  id="btn_button" class="btn btn-pay  btn-danger" disabled>Pay Order</button>
                       <input style="display: none;" name="total" value="{{ $subtotal }}">
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