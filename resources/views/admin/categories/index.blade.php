@extends('admin.layouts.master')
@section('title' , 'Categories')


@section('content')

<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Categories</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
        </div>
        <div class="card-body">
        @if(session()->has('success'))

        <div class="alert alert-outline-success" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span></button>
            {{session()->get('success')}}
        </div>

    @endif
            <div class="table-responsive">
                <table class="table table-bordered mg-b-0 text-md-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Operations</th>
                            {{-- <th>Description</th> --}}
                            {{-- <th>Image</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{str_replace('-',' ',$category->name)}}</td>
                            <td>
                                <div class="btn-icon-list">
                                    <a href="{{route('categories.edit' , $category->id)}}" title="edit" class="btn btn-success btn-icon"><i class="typcn typcn-edit"></i></a>
                                    <a class="btn btn-danger btn-icon" title="delete" href="#" data-id={{$category->id}} data-target="#modaldemo5{{$category->id}}" data-toggle="modal"><i class="typcn typcn-delete"></i></a>
                                </div>

                                <div class="modal" id="modaldemo5{{$category->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content tx-size-sm">
                                            <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                
                                
                                            <form action="{{route('categories.destroy' , $category->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                <h4 class="tx-danger mg-b-20">Are You Sure To Delete This ?</h4>
                                                <button class="btn ripple btn-danger pd-x-25" type="submit">Delete</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{-- <td>{{$category->description}}</td> --}}
                            {{-- <td>
                                <img alt="Responsive image" class="rounded float-sm-left wd-100p wd-sm-200" src="{{$category->image}}">
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection