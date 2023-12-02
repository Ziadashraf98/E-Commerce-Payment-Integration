@extends('admin.layouts.master')
@section('title' , 'Add Category')
    

@section('css')
<link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
@endsection



@section('content')
<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
    <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">

            @if ($errors->any())
          <div class="alert alert-outline-danger mg-b-0" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span></button>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
          @endif
        
          @if(session()->has('success'))

          <div class="alert alert-outline-success" role="alert">
              <button aria-label="Close" class="close" data-dismiss="alert" type="button">
              <span aria-hidden="true">&times;</span></button>
              {{session()->get('success')}}
          </div>
  
          @endif
            {{-- <div class="main-content-label mg-b-5">
                Add Category
            </div> --}}
            <br>
            <p class="mg-b-20">{{__('Add Category')}}</p>
            <div class="panel panel-primary tabs-style-2">
                <div class=" tab-menu-heading">
                    <div class="tabs-menu1">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs main-nav-line">
                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">English</a></li>
                            <li><a href="#tab2" class="nav-link" data-toggle="tab">عربي</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        <div class="panel-body tabs-menu-body main-content-body-right border">
        <div class="tab-content">
            
            <div class="row row-sm tab-pane active" id="tab1">
                <div class="col-lg">
                    <label >{{__('Category Name (english)')}}</label>
                    <input class="form-control mg-b-20" name="name_en" placeholder="{{__('category name (english)')}}" type="text">
                    {{-- <label >Description</label> --}}
                        {{-- <textarea class="form-control" name="description" placeholder="description" placeholder="Textarea" rows="3"></textarea> --}}
                </div>
            </div>
            
            <div class="row row-sm tab-pane" id="tab2" >
                <div class="col-lg">
                    <label >{{__('Category Name (arabic)')}}</label>
                    <input class="form-control mg-b-20" name="name_ar" placeholder="{{__('category name (arabic)')}}" type="text">
                    {{-- <label >Description</label> --}}
                        {{-- <textarea class="form-control" name="description" placeholder="description" placeholder="Textarea" rows="3"></textarea> --}}
                </div>
            </div>
        
        </div>
        </div>
        <br>

        
            
            {{-- <div>
                <label >Image</label>
                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4">
                        <input type="file" name="image" class="dropify" data-height="200" />
                    </div>
                </div>
            </div>
            <br>       --}}
                            
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('dashboard')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>
</form>

@endsection


@section('js')
<script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection