<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;
use App\traits\generalTrait;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    use generalTrait;
    public function index()
    {
        // $lang = App::getLocale();
        $lang = App::currentLocale();

        // get products from database
        $products = Product::select('id',"name_$lang AS name","details_$lang AS details" ,'price','quantity','photo','subcategory_id','brand_id','status')->get();
        // return json response with products
        // return response()->json(['products' => $products], 200);
        return $this->returnData((object)['products' => $products]);
        // return data
    }

    public function create()
    {
        $brands = Brand::select('id', 'name_en', 'name_ar')->where('status', 1)->orderBy('name_en')->get();
        $subcategories = Subcategory::select('id', 'name_en', 'name_ar')->where('status', 1)->orderBy('name_en')->get();
        // return response()->json(['brands' => $brands, 'subcategories' => $subcategories]);
        return $this->returnData((object)['brands' => $brands, 'subcategories' => $subcategories]);
        // return data
    }

    public function store(StoreProductRequest $request)
    {
        $photoName = $this->uploadPhoto($request->photo, 'products');
        $data = $request->except('photo');
        $data['photo'] = $photoName;
        Product::create($data);
        // return response()->json(['success' => true, 'message' => 'product successfully created']);
        return $this->returnSuccessMessage('product successfully created',201);
        // return success message
    }

    public function edit($id)
    {
        // validation on id
        $product = Product::findOrFail($id);
        $brands = Brand::select('id', 'name_en', 'name_ar')->where('status', 1)->orderBy('name_en')->get();
        $subcategories = Subcategory::select('id', 'name_en', 'name_ar')->where('status', 1)->orderBy('name_en')->get();
        // return response()->json(['success' => true, 'data' => ['product' => $product, 'brands' => $brands, 'subcategories' => $subcategories]]);
        // return data
        return $this->returnData((object) ['product' => $product, 'brands' => $brands, 'subcategories' => $subcategories]);
    }

    public function update(UpdateProductRequest $request)
    {
        $data = $request->except('_method', 'photo');
        // upload photo if exists
        if ($request->has('photo')) {
            $photoName = $this->uploadPhoto($request->photo, 'products');
            $data['photo'] = $photoName;
        }
        Product::where('id', $request->id)->update($data);
        // return response()->json(['success' => 'true', 'message' => 'product successfully updated']);
        return $this->returnSuccessMessage('product successfully updated',202);

        // success message
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            $photoPath = public_path('images\products\\' . $product->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
            // return response()->json(['message'=>'product successfully deleted'],200);
            return $this->returnSuccessMessage('product successfully deleted',200);
            // success message
        } else {
            // return response()->json(['message'=>'product not found'],404);
            return $this->returnErrorMessage('product not found',404);

            // error message
        }
    }
}
