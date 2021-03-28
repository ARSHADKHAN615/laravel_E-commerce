@extends('admin/layout')
@section('title','Color')
@section('color_Active','active')
@section('content')
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">         
                        {{-- c  --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="m-b-10">Color</h1>
                                <a href="{{url('admin/color/manage_color')}}">
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
                                                <th>Color</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)  
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->color }}</td>
                                                 @if ($item->status==1)
                                                <td><a href="color/status/0/{{$item->id}}" class="btn btn-success">Active</a></td>      
                                                @else
                                                <td><a href="color/status/1/{{$item->id}}" class="btn btn-danger">Deactive</a></td>      
                                                @endif
                                                <td class="text-right"><a href="color/delete/{{$item->id}}" class="btn btn-danger">Delete</a><a href="color/manage_color/{{$item->id}}" class="btn btn-primary mx-3">Edit</a></td>
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