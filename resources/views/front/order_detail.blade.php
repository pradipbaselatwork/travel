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
                  <h1 class="breadCrumb_title">Order Detail</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="index.html" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>Order Detail</span></li>
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
      <h1 class="section_title border center">Order Detail</h1>
      <table class="cart_table">
        <thead class="column-labels">
          <tr>
            <th><label class="product-serial">SN</label></th>
            <th><label class="product-name">Name</label></th>
            <th><label class="payment-method">Payment Method</label></th>
            <th><label class="email">Email</label></th>
            <th><label class="product-status">Status</label></th>
            <th><label class="product-total">Total Price</label></th>
            <th><label class="product-order">See Order</label></th>
          </tr>
        </thead>
        <?php 
    
        $subtotal = 0;
        ?>
        <tbody class="product">
          @forelse($orderdeta as $data)
          <tr>
            <td class="center">{{$data->id}}.</td>
            <td class="center">{{$data->name}} </td>
            <td class="center">{{$data->payment_method}} </td>
            <td class="center">{{$data->email}} </td>
            <td class="center">{{$data->status}} </td>
            <td class="center">{{$data->total}} </td>
            <td class="center"><a href="{{ route('seeorderdetail',$data->id )}}"> Show Order </a></td>
          </tr>
          <?php $subtotal +=$data->price?>
          @empty
          <p></p>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
  <div class="clear pt-3"></div>

@endsection