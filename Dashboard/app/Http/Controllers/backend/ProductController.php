<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\traits\generalTrait;

class ProductController extends Controller
{
    use generalTrait;
    public function index()
    {
        // get data from databse
        $products = DB::table('products')->select('id','name_en', 'name_ar','status','quantity','price','created_at') ->latest()->get();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        $brands = DB::table('brands')->select('id','name_en','name_ar')->where('status',1)->orderBy('name_en')->get();
        $subcategories = DB::table('subcategories')->select('id','name_en','name_ar')->where('status',1)->orderBy('name_en')->get();
        return view('products.create',compact('brands','subcategories'));
    }


    public function edit($id)
    {
        // validate on id with out using database queries
        // without using request classes
        $product = DB::table('products')->where('id','=',$id)->first();
        $brands = DB::table('brands')->select('id','name_en','name_ar')->where('status',1)->orderBy('name_en')->get();
        $subcategories = DB::table('subcategories')->select('id','name_en','name_ar')->where('status',1)->orderBy('name_en')->get();

        return view('products.edit',compact('product','brands','subcategories'));
    }

    // dependancy injection
    public function store(StoreProductRequest $request)
    {
        $photoName = $this->uploadPhoto($request->photo,'products');
        // insert data
        $data = $request->except('_token','index','return','photo');
        $data['photo'] = $photoName;
        DB::table('products')->insert($data);
        return $this->redirectAccordingToRequest($request);
    }

    public function update(UpdateProductRequest $request)
    {
        $data = $request->except('_token','_method','photo','index','return');
        // upload photo if exists
        if($request->has('photo')){
            $photoName = $this->uploadPhoto($request->photo,'products');
            $data['photo'] = $photoName;
        }
        DB::table('products')->where('id',$request->id)->update($data);
        return $this->redirectAccordingToRequest($request);
    }

    public function destroy(Request $request,$id)
    {
        // dd($id);
        $product = DB::table('products')->where('id',$id)->first();
        if($product){
            DB::table('products')->where('id',$id)->delete();
            $photoPath = public_path('images\products\\'.$product->photo);
            if(file_exists($photoPath)){
                unlink($photoPath);
            }
            return $this->redirectAccordingToRequest($request);
        }else{
            abort(404,'product not found');
        }

    }


    public function redirectAccordingToRequest($request)
    {
        if($request->has('index')){
            return redirect()->route('dashboard.products.index')->with('success','Operation Successfully Completed');
        }else{
            return redirect()->back()->with('success','Operation Successfully Completed');
        }
    }

}
