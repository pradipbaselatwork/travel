@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Package</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
    
    @error('url')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @enderror 
    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">{{ $title}}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <form
        @if(!empty($packagedata['id'])) action="{{route('admin.add.edit.package',$packagedata['id'])}}" @else action="{{route('admin.add.edit.package')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title *</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter title"
                  @if(!empty($packagedata['title']))
                  value= "{{$packagedata['title']}}"
                  @else value="{{old('title')}}"
                  @endif>
                  <p style="color: red">
                    @error('title')
                      {{ $message }}
                    @enderror
                  </p>
                </div>

                  <div class="form-group">
                    <label>Our Packages *</label>
                    <select class="form-control" name="packagetype_id">
                      <option value="">Select</option>
                      @forelse($packagetype as $data)
                      <option value="{{ $data->id }}"
                        @if (!empty($packagedata['packagetype_id']) && $packagedata['packagetype_id']==$data->id)
                        selected=""
                            
                        @else {{ old('packagetype_id') ==  $data->id ? 'selected' : '' }}                            
                        @endif
                        >{{ $data->package_type }}</option>
                      @empty
                      @endforelse
                    </select>
                    <p style="color: red">
                      @error('packagetype_id')
                        {{ $message }}
                      @enderror
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="expire_date">Expire Date</label>
                    <input type="date" class="form-control" name="expire_date" id="expire_date" placeholder="Enter expire_date"
                    @if(!empty($packagedata['expire_date']))
                    value= "{{$packagedata['expire_date']}}"
                    @else value="{{old('expire_date')}}"
                    @endif>
            
                  </div>

                  <div class="form-group">
                    <label for="image">First Image </label>
                    <input type="file" class="form-control" id="image" name="image" @if(!empty($projectdata['image']))
                    value= "{{$projectdata['image']}}"
                    @else value="{{old('image')}}"
                    @endif><br>
                    @if(!empty($projectdata['image']))
                    <img src="{{asset($projectdata['image'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.project.image',$projectdata['id']) }}">&nbsp;&nbsp;</a> 
                    @endif
                 
                  </div>  
  
                  <div class="form-group">
                    <label for="image_1">Second Image </label>
                    <input type="file" class="form-control" id="image_1" name="image_1" @if(!empty($projectdata['image_1']))
                    value= "{{$projectdata['image_1']}}"
                    @else value="{{old('image_1')}}"
                    @endif><br>
                    @if(!empty($projectdata['image_1']))
                    <img src="{{asset($projectdata['image_1'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.project.image',$projectdata['id']) }}">&nbsp;&nbsp;</a> 
                    @endif
                   
                  </div> 
  
                <div class="form-group">
                  <label for="image_2">Third Image </label>
                  <input type="file" class="form-control" id="image_2" name="image_2" @if(!empty($projectdata['image_2']))
                    value= "{{$projectdata['image_2']}}"
                    @else value="{{old('image_2')}}"
                    @endif><br>
                    @if(!empty($projectdata['image_2']))
                    <img src="{{asset($projectdata['image_2'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.project.image',$projectdata['id']) }}">&nbsp;&nbsp;</a> 
                    @endif
                
                </div>  

                <div class="form-group">
                  <label for="description">First Description</label>
                  <textarea name="description" id="description" class="textarea" cols="20" class="form-control" rows="4"> @if(!empty($projectdata['description']))
                    {{$projectdata['description']}}
                    @else {{old('description')}}
                    @endif</textarea>
                </div>

                <div class="form-group">
                  <label for="textarea_1">Second Description</label>
                  <textarea name="textarea_1" id="textarea_1" class="textarea" cols="20" class="form-control" rows="4"> @if(!empty($projectdata['textarea_1']))
                    {{$projectdata['textarea_1']}}
                    @else {{old('textarea_1')}}
                    @endif</textarea>
                </div>

                <div class="form-group">
                  <label for="textarea_2">Third Description</label>
                  <textarea name="textarea_2" id="textarea_2" class="textarea" cols="20" class="form-control" rows="4"> @if(!empty($projectdata['textarea_2']))
                    {{$projectdata['textarea_2']}}
                    @else {{old('textarea_2')}}
                    @endif</textarea>
                </div>

                  <div class="form-group">
                    <label for="price">Price *</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter price"
                    @if(!empty($packagedata['price']))
                    value= "{{$packagedata['price']}}"
                    @else value="{{old('price')}}"
                    @endif>
                    <p style="color: red">
                      @error('price')
                        {{ $message }}
                      @enderror
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Enter url"
                    @if(!empty($packagedata['url']))
                    value= "{{$packagedata['url']}}"
                    @else value="{{old('url')}}"
                    @endif>
                  </div>

                  <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <textarea name="meta_title" id="meta_title" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['meta_title']))
                      {{$packagedata['meta_title']}}
                      @else {{old('meta_title')}}
                      @endif</textarea>
                  </div>

                  <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['meta_description']))
                      {{$packagedata['meta_description']}}
                      @else {{old('meta_description')}}
                      @endif</textarea>
                  </div>

                  <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['meta_keywords']))
                      {{$packagedata['meta_keywords']}}
                      @else {{old('meta_keywords')}}
                      @endif</textarea>
                  </div>

            </div>
          </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{$button}}</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

