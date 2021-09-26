@extends('layouts.parent')
@section('title', 'Edit Products')
@section('card-color', 'warning')
@section('content')

    <div class="col-12">
        <form>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Name En</label>
                        <input type="text" name="name_en" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Name Ar</label>
                        <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" name="price" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="exampleInputEmail1">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Details En</label>
                        <textarea class="form-control" name="details_en" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Details AR</label>
                        <textarea class="form-control" name="details_ar" id="" cols="30" rows="2"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1"> Active </option>
                            <option value="0"> Not Active </option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="exampleInputEmail1">Brand</label>
                        <select name="brand_id" class="form-control" id="">
                            <option value="1"> Active </option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="exampleInputEmail1">Sub Category</label>
                        <select name="subcategory_id" class="form-control" id="">
                            <option value="1"> Active </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="create" class="btn btn-warning">Update</button>
                <button type="submit"  name="create-return"  class="btn btn-warning">Update & Return</button>
            </div>
        </form>
    </div>

@endsection
