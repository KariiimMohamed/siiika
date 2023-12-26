<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        return view('dashboard.backend.products.index' , compact('products'));
    }

    
    public function create()
    {
        $categories = Category::where('type' , 'category')->get();
        return view('dashboard.backend.products.create' , compact('categories'));

    }

   
    public function store(ProductRequest $request)
    {
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('products');
        }

        Product::create($data);
   
        return redirect(route('admin.products.index'))->with('success', 'Data Created Successfully');
        
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $categories = Category::where('type' , 'category')->get();
        $product = Product::where('id' , $id)->first();
        return view('dashboard.backend.products.edit' , compact('product' , 'categories'));

    }

   
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::where('id' , $id)->first();
        $data = $request->except('img');

        if ($request->hasFile('img') && $product->img) {
            Storage::delete($product->img);
            $data['img'] = $request->file('img')->store('statics');

        }else {
            $data['img'] = $product->img;
        }

        $product->update($data);
        return redirect(route('admin.products.index'))->with('success', 'Data Updated Successfully');
        
    }

   
    public function destroy(string $id)
    {
        $product = Product::where('id' , $id)->delete();
        return redirect(route('admin.products.index'))->with('success', 'Data Deleted Successfully');

    }
}
