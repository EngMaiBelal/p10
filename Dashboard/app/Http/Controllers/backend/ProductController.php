<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
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


    public function edit()
    {
        return view('products.edit');
    }

    // dependancy injection
    public function store(Request $request)
    {
        // validation

        $rules = [
            'name_en'=>['required','max:1000','string','min:2'],
            'name_ar'=>['required','max:1000','string','min:2'],
            'price'=>['required','numeric','min:1','max:99999.99'],
            'quantity'=>['nullable','integer','min:1','max:999'],
            'status'=>['nullable','integer','min:0','max:1'],
            'details_en'=>['nullable','string'],
            'details_ar'=>['nullable','string'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'photo'=>['required','max:1000','mimes:png,jpg,jpeg']
        ];
        $request->validate($rules);
        // upload photo
        $photoName = time(). '.' . $request->photo->extension();
        // relative , abs
        $request->photo->move(public_path('images\products'),$photoName);
        // insert data
        $data = $request->except('_token','create','create-return','photo');
        $data['photo'] = $photoName;
        DB::table('products')->insert($data);

        if($request->has('create')){
            return redirect()->route('dashboard.products.index')->with('success','Product Successfully Created');
        }else{
            return redirect()->back()->with('success','Product Successfully Created');
        }

    }

}
