<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    
    public function index() 
    {
        $categories = Category::where('type' , 'category')->get();
        return view('dashboard.backend.categories.index' , compact('categories'));
    }

    
    public function create()
    {

        return view('dashboard.backend.categories.create');

    }

   
    public function store(CategoryRequest $request)
    {
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('categories');
        }
        $data['type'] = 'category';
        Category::create($data);
        return redirect(route('admin.categories.index'))->with('success', 'Data Created Successfully');
        
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $category = Category::where('id' , $id)->first();
        return view('dashboard.backend.categories.edit' , compact('category'));

    }

   
    public function update(CategoryRequest $request, string $id)
    { 
      
        $category = Category::where('id' , $id)->first();
        $data = $request->except('img');

        if ($request->hasFile('img')) {
            Storage::delete($category->img);
            $data['img'] = $request->file('img')->store('categories');

        }else {
            $data['img'] = $category->img;
        }

        $category->update($data);
        return redirect(route('admin.categories.index'))->with('success', 'Data Updated Successfully');

        
    }

   
    public function destroy(string $id)
    {
        $category = Category::where('id' , $id)->delete();
        return redirect(route('admin.categories.index'))->with('success', 'Data Deleted Successfully');
    }
}
