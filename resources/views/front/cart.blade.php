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
                  <h1 class="breadCrumb_title">Cart</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Cart</span></li>
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
         <h1 class="section_title border center">Cart</h1>
         @if(Session::has('success_message'))
         <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
           {{ Session::get('success_message') }}
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
                <th><label class="product-removal">Remove</label></th>
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
                <td>
                   <a href="{{ route('delete.cart',$data->id) }}"> <div class="product-removal">
                    <button class="remove-product"> <i class="fa-solid fa-trash"></i> </button>
                    </div></a>
                </td>
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
          <a href="{{ route('checkout') }}" class="checkout_btn btn pull-right">Proceed to Checkout</a> 
          <!--   <button class="checkout_btn btn btn-danger">Proceed to Checkout</button>--> 
          
        </div>
   
  </section>
   
  <div class="clear pt-3"></div>


  @endsection