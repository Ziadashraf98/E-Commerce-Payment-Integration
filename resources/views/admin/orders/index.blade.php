@extends('admin.layouts.master')
@section('title' , 'Orders')

@section('content')

<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Orders</h4>
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-md-nowrap" id="example1">
                    <thead>
                        <tr>
                            <th class="wd-5p border-bottom-0">ID</th>
                            <th class="wd-5p border-bottom-0">Name</th>
                            <th class="wd-5p border-bottom-0">Email</th>
                            <th class="wd-5p border-bottom-0">Phone</th>
                            <th class="wd-5p border-bottom-0">Address</th>
                            <th class="wd-5p border-bottom-0">Quantity</th>
                            <th class="wd-5p border-bottom-0">Price</th>
                            <th class="wd-5p border-bottom-0">Product</th>
                            <th class="wd-5p border-bottom-0">Payment Status</th>
                            <th class="wd-5p border-bottom-0">Delivery Status</th>
                            <th class="wd-5p border-bottom-0">Image</th>
                            <th class="wd-5p border-bottom-0">Delivery</th>
                            <th class="wd-5p border-bottom-0">Print PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->user->email}}</td>
                            <td>{{$order->user->phone}}</td>
                            <td>{{$order->user->address}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{str_replace('-',' ',$order->product->title)}}</td>
                            {{-- @if($order->payment_status == 'cash on delivery') --}}
                            <td>{{$order->payment_method}}</td>
                            {{-- @else
                            <td><h5 class="text-success">{{$order->payment_status}}</h5></td>
                            @endif --}}
                            
                            @if($order->delivery_status == 'processing')
                            <td><h5 class="text-warning">{{$order->delivery_status}}</h5></td>
                            @else
                            <td><h5 class="text-success">{{$order->delivery_status}}</h5></td>
                            @endif
                            
                            <td>
                                <img alt="Responsive image" class="rounded float-sm-left wd-100p wd-sm-200" src="{{asset('images/products/'.$order->image)}}">
                            </td>
                            <td>
                                <div class="btn-icon-list">
                                    @if($order->delivery_status == 'processing')
                                    <a href="#" title="delivery" class="btn btn-success btn-icon" data-id={{$order->id}} data-target="#modaldemo4{{$order->id}}" data-toggle="modal"><i class="icon ion-ios-rocket"></i></a>
                                    @endif
                                    {{-- <a class="btn btn-danger btn-icon" title="delete" href="#" data-id={{$order->id}} data-target="#modaldemo5{{$order->id}}" data-toggle="modal"><i class="typcn typcn-delete"></i></a> --}}
                                </div>

                                {{-- <div class="modal" id="modaldemo5{{$order->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content tx-size-sm">
                                            <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                
                                
                                            <form action="{{route('products.destroy' , $order->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                <h4 class="tx-danger mg-b-20">Are You Sure To Delete This ?</h4>
                                                <button class="btn ripple btn-danger pd-x-25" type="submit">Delete</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                
                                <div class="modal" id="modaldemo4{{$order->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content tx-size-sm">
                                            <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                
                                
                                            <form action="{{route('orders.update' , $order->id)}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon ion-ios-checkmark-circle-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i>
                                                <h4 class="tx-success tx-semibold mg-b-20">Are You Sure This Product Is Delivered ?</h4>
                                                <button class="btn ripple btn-success pd-x-25" type="submit">Yes</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('print_PDF' , $order->id)}}" title="PDF" class="btn btn-warning  btn-icon"><i class="far fa-file-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>




@endsection

@section('js')
<script src="{{asset('admin/assets/js/table-data.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
@endsection