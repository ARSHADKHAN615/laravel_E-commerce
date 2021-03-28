@extends('admin/layout')
@section('title','Manage Category')
@section('category_Active','active')
@section('content')
   <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">         
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="m-b-10">Manage Category</h1>
                                <a href="{{url('admin/category')}}">
                                    <button type="button" class="btn btn-success btn-lg mb-4">
                                        <i class="fa fa-arrow-left"></i>&nbsp;  Back
                                    </button>
                                </a><br>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <hr>
                                        <form action="{{route('category.insert')}}" method="POST" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" name="u-id" value="{{$id}}">
                                                <label for="cc-payment" class="control-label mb-1">Category</label>
                                                <input id="cc-pament" name="Category" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category_name}}" required>
                                                @error('Category')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Slug</label>
                                                <input id="cc-pament" name="Category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category_slug}}" required>
                                                 @error('Category_slug')
                                                 {{$message}}
                                                @enderror
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              
                                                    <span id="payment-button-amount">Submit</span>
                                                
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
@endsection