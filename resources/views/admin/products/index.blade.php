@extends('admin.layouts.master')
@section('title' , 'Products')


@section('content')

<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Products</h4>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{str_replace('-',' ',$product->title)}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{str_replace('-',' ',$product->category->name)}}</td>
                            <td>
                                <img alt="Responsive image" class="rounded float-sm-left wd-100p wd-sm-200" src="{{asset('images/products/'.$product->image)}}">
                            </td>
                            <td>
                                <div class="btn-icon-list">
                                    <a href="{{route('products.edit' , $product->id)}}" title="edit" class="btn btn-success btn-icon"><i class="typcn typcn-edit"></i></a>
                                    <a class="btn btn-danger btn-icon" title="delete" href="#" data-id={{$product->id}} data-target="#modaldemo5{{$product->id}}" data-toggle="modal"><i class="typcn typcn-delete"></i></a>
                                </div>

                                <div class="modal" id="modaldemo5{{$product->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content tx-size-sm">
                                            <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                
                                
                                            <form action="{{route('products.destroy' , $product->id)}}" method="POST">
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection