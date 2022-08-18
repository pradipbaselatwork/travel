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
                  <h1 class="breadCrumb_title">See Order Detail</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="index.html" class="breadCrumb_link">Home</a></li>
                      <li><i class="fa fa-arrow-right-long"></i></li>
                      <li><span>See Order Detail</span></li>
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
      <h1 class="section_title border center">See Order Detail</h1>
      <table class="cart_table">
        <thead class="column-labels">
          <tr>
            <th><label class="product-serial">SN</label></th>
            <th><label class="product-image">Image</label></th>
            <th><label class="product-name">Name</label></th>
            <th><label class="product-price">Price</label></th>
          </tr>
        </thead>
        <?php 
  $subtotal = 0;
  ?>
        <tbody class="product">
          @forelse($seeorderdetail as $data)
          <tr>
            <td class="center">{{$data->id}}.</td>
            <td class="center"> <img src="{{asset($data->image)}}" style="width: 100px; height:80px;" alt="" title=""></td>
            <td class="center">{{$data->name}}</td>
            <td class="center font-weight-bold">{{$data->price}} </td>
          </tr>
          <?php $subtotal +=$data->price?>
          @empty
          <p>No Data</p>
          @endforelse
           
        </tbody>
      </table>
    </div>
  </section>
  <div class="clear pt-3"></div>
@endsection