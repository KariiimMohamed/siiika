<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaticRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaticController extends Controller
{
    
    public function index()
    {
        $statics = Category::where('type' , 'static')->get();
        return view('dashboard.backend.statics.index' , compact('statics'));
    }

    
    public function create()
    {
    
        return view('dashboard.backend.statics.create');

    }

   
    public function store(StaticRequest $request)
    {
        
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('statics');
        }
        $data['type'] = 'static';
        Category::create($data);
        return redirect(route('admin.statics.index'))->with('success', 'Data Created Successfully');
        
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $static = Category::where('id' , $id)->first();
        return view('dashboard.backend.statics.edit' , compact('static'));

    }

   
    public function update(StaticRequest $request, string $id)
    {
        $category = Category::where('id' , $id)->first();
        $data = $request->except('img');

        if ($request->hasFile('img')) {
            Storage::delete($category->img);
            $data['img'] = $request->file('img')->store('statics');

        }else {
            $data['img'] = $category->img;
        }

        $category->update($data);
        return redirect(route('admin.statics.index'))->with('success', 'Data Updated Successfully');

        
    }

   
    public function destroy(string $id)
    {
        $category = Category::where('id' , $id)->delete();        
        return redirect(route('admin.statics.index'))->with('success', 'Data Deleted Successfully');

    }
}
