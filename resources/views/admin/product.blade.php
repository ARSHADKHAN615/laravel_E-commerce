@extends('admin/layout')
@section('title','Product')
@section('product_Active','active')
@section('content')
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">         
                        {{-- c  --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="m-b-10">Product</h1>
                                <a href="{{url('admin/product/manage_product')}}">
                                    <button type="button" class="btn btn-primary btn-lg mb-4">
                                        <i class="fa fa-plus-circle"></i>&nbsp;  Add
                                    </button>
                                </a>                 
                                    @if(session("mess"))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>{{session("mess")}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)  
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->slug }}</td>
                                                 @if ($item->status==1)
                                                <td><a href="product/status/0/{{$item->id}}" class="btn btn-success">Active</a></td>      
                                                @else
                                                <td><a href="product/status/1/{{$item->id}}" class="btn btn-danger">Deactive</a></td>      
                                                @endif
                                                <td class="text-right"><a href="product/delete/{{$item->id}}" class="btn btn-danger">Delete</a><a href="product/manage_product/{{$item->id}}" class="btn btn-primary mx-3">Edit</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
@endsection