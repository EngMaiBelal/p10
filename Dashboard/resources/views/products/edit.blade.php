@extends('layouts.parent')
@section('title', 'Edit Products')
@section('card-color', 'warning')
@section('content')
    @include('messages.message')
    <div class="col-12">
        <form method="post" action="{{route('dashboard.products.update')}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="col-12">
                        @error('id')
                        <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Name En</label>
                        <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror"
                            id="exampleInputEmail1" value="{{$product->name_en}}">
                        @error('name_en')
                            <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="exampleInputEmail1">Name Ar</label>
                        <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror"
                            id="exampleInputEmail1" value="{{$product->name_ar}}">
                        @error('name_ar')
                            <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" step="0.1" name="price" class="form-control @error('price') is-invalid @enderror"
                            id="exampleInputEmail1" value="{{$product->price}}">
                        @error('price')
                            <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="quantity" class="form-control  @error('quantity') is-invalid @enderror"
                            id="exampleInputEmail1" value="{{$product->quantity}}">
                        @error('quantity')
                            <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Details En</label>
                        <textarea class="form-control  @error('details_en') is-invalid @enderror" name="details_en" id="" cols="30" rows="2">{{$product->details_en}}</textarea>
                        @error('details_en')
                        <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Details AR</label>
                        <textarea class="form-control @error('details_ar') is-invalid @enderror" name="details_ar" id="" cols="30" rows="2">{{$product->details_ar}}</textarea>
                        @error('details_ar')
                        <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" class="form-control  @error('status') is-invalid @enderror" id="">
                            <option {{ $product->status == 1 ? 'selected' : ''}} value="1"> Active </option>
                            <option {{ $product->status == 0 ? 'selected' : ''}} value="0"> Not Active </option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                        <label for="exampleInputEmail1">Brand</label>
                        <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="">
                            <option value="" > No Brand </option>
                            @foreach ($brands as $brand)
                                <option {{ $product->brand_id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}" >{{$brand->name_en}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-4">
                        <label for="exampleInputEmail1">Sub Category</label>
                        <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" id="">
                            @foreach ($subcategories as $sub)
                                <option {{ $product->subcategory_id == $sub->id ? 'selected' : ''}}  value="{{$sub->id}}" >{{$sub->name_en}}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                        <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                    @error('photo')
                    <div class="alert alert-danger mt-3 w-100">{{ $message }}</div>
                @enderror

                </div>
                <div class="form-row">
                    <div class="col-4">
                        <img src="{{asset('images/products/'.$product->photo)}}" class="w-100" alt="">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="index" class="btn btn-warning">Update</button>
                <button type="submit" name="return" class="btn btn-warning">Update & Return</button>
            </div>
        </form>
    </div>

@endsection
