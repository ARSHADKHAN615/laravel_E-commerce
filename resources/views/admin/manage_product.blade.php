@extends('admin/layout')
@section('title','Product')
@section('product_Active','active')
@section('content')
   <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">         
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="m-b-10">Manage Product</h1>
                                <a href="{{url('admin/product')}}">
                                    <button type="button" class="btn btn-success btn-lg mb-4">
                                        <i class="fa fa-arrow-left"></i>&nbsp;  Back
                                    </button>
                                </a><br>
                                <div class="card">
                                    <div class="card-body">
                                        <hr>
                                        <form action="{{route('product.insert')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" name="u-id" value="{{$id}}">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input id="cc-pament" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$name}}" required>
                                                @error('name')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Slug</label>
                                                <input id="cc-pament" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$slug}}" required>
                                                @error('slug')
                                                {{$message}}
                                                @enderror
                                            </div>
                                             <div class="form-group">
                                                {{-- <label for="cc-payment" class="control-label mb-1">Category</label>
                                                <input id="cc-pament" name="category_id" type="number" class="form-control" aria-required="true" aria-invalid="false" value="{{$category_id}}" required> --}}
                                                <select class="form-control" name="category_id">
                                                      <option disabled>Default select</option>
                                                      @foreach ($category as $item)             
                                                      <option value="{{$item->id}}">{{$item->category_name}}</option>
                                                      @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="cc-pament" name="image" type="file" class="form-control p-1" aria-required="true" aria-invalid="false" value="{{$image}}" required>                                                 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Brand</label>
                                                <input id="cc-pament" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$brand}}" required>                                                 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Model</label>
                                                <input id="cc-pament" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$model}}" required>                                                 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">KeyWord</label>
                                                <input id="cc-pament" name="keyword" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$keyword}}" required>                                                 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Technical Spec</label>
                                                <input id="cc-pament" name="technical_spec" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$technical_spec}}" required>                                                 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Uses</label>
                                                <input id="cc-pament" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$uses}}" required>                                                 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Warranty</label>
                                                <input id="cc-pament" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$warranty}}" required>                                                 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Short Description</label>
                                                 <textarea class="form-control" name="short_desc" id="exampleFormControlTextarea1" rows="3" required>{{$short_desc}}</textarea>                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Description</label>
                                                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" required>{{$desc}}</textarea>                                               
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