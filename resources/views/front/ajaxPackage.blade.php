<div class="row special_package">
    @forelse($package as $data)
  <div class="col col-md-4 col-sm-6 col-12 portfolio-item">
    <div class="single_package"> <a href="{{ route('package.detail', $data->id) }}">
      <figure class="pkg-img"> <span class="price-box">{{ $data->price }}/person</span> <img src="{{ asset($data->image) }}"> 
        <!--<div class="box_caption">
              <h3>Everest B.C &amp; Gokyo Lakes</h3>
            </div>--> 
        
      </figure>
      </a>
      <figcaption class="expedition_caption">
        <div class="expedition_wrapper">
          <h4 class="collection">Collection</h4>
          <h4 class="pkg-title">{{ $data->title }}</h4>
          <p>{{ $data->subtitle }}</p>
          <div class="tour-review"> <span class="reviews-stars"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="reviews-count">(3)</span> </div>
          <span class="pkg-price">From/{{ $data->price }}</span> </div>
      </figcaption>
    </div>
  </div>
  @empty
  @endforelse
</div>