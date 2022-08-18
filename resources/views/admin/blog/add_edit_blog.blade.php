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
              <li class="breadcrumb-item active">Edit Blog</li>
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
        @if(!empty($blogdata['id'])) action="{{route('admin.add.edit.blog',$blogdata['id'])}}" @else action="{{route('admin.add.edit.blog')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title *</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter title"
                  @if(!empty($blogdata['title']))
                  value= "{{$blogdata['title']}}"
                  @else value="{{old('title')}}"
                  @endif>
                  <p style="color: red">
                    @error('title')
                      {{ $message }}
                    @enderror
                  </p>
                </div>

                <div class="form-group">
                  <label for="image">Image *</label>
                  <input type="file" class="form-control" id="image" name="image" @if(!empty($blogdata['image']))
                  value= "{{$blogdata['image']}}"
                  @else value="{{old('image')}}"
                  @endif><br>
                  @if(!empty($blogdata['image']))
                  <img src="{{asset($blogdata['image'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.blog.image',$blogdata['id']) }}">&nbsp;&nbsp;</a> 
                  @endif
                  <p style="color: red">
                    @error('image')
                      {{ $message }}
                    @enderror
                  </p>
                </div>  

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" class="textarea" cols="20" class="form-control" rows="4"> @if(!empty($blogdata['description']))
                    {{$blogdata['description']}}
                    @else {{old('description')}}
                    @endif</textarea>
                </div>

                <div class="form-group">
                  <label for="url">Url</label>
                  <input type="text" class="form-control" name="url" id="url" placeholder="Enter url"
                  @if(!empty($blogdata['url']))
                  value= "{{$blogdata['url']}}"
                  @else value="{{old('url')}}"
                  @endif>
                </div>

                <div class="form-group">
                  <label for="meta_title">Meta Title</label>
                  <textarea name="meta_title" id="meta_title" cols="20" class="form-control" rows="4"> @if(!empty($blogdata['meta_title']))
                    {{$blogdata['meta_title']}}
                    @else {{old('meta_title')}}
                    @endif</textarea>
                </div>

                <div class="form-group">
                  <label for="meta_description">Meta Description</label>
                  <textarea name="meta_description" id="meta_description" cols="20" class="form-control" rows="4"> @if(!empty($blogdata['meta_description']))
                    {{$blogdata['meta_description']}}
                    @else {{old('meta_description')}}
                    @endif</textarea>
                </div>

                <div class="form-group">
                  <label for="meta_keywords">Meta Keywords</label>
                  <textarea name="meta_keywords" id="meta_keywords" cols="20" class="form-control" rows="4"> @if(!empty($blogdata['meta_keywords']))
                    {{$blogdata['meta_keywords']}}
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

