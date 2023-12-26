<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services = Category::where('type' , 'service')->get();
        return view('dashboard.backend.services.index' , compact('services'));
    }

     
    public function create()
    {
        return view('dashboard.backend.services.create');

    }

   
    public function store(ServiceRequest $request)
    {
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('statics');
        }
        $data['type'] = 'service';
        Category::create($data);
        return redirect(route('admin.services.index'))->with('success', 'Data Created Successfully');
        
        
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $service = Category::where('id' , $id)->first();
        return view('dashboard.backend.services.edit' , compact('service'));

    }

   
    public function update(ServiceRequest $request, string $id)
    {
        $category = Category::where('id' , $id)->first();
        $data = $request->except('img');

        if ($request->hasFile('img')) {
            Storage::delete($category->img);
            $data['img'] = $request->file('img')->store('services');

        }else {
            $data['img'] = $category->img;
        }

        $category->update($data);
        return redirect(route('admin.services.index'))->with('success', 'Data Updated Successfully');

        
    }

   
    public function destroy(string $id)
    {
        $category = Category::where('id' , $id)->delete();        
        return redirect(route('admin.services.index'))->with('success', 'Data Deleted Successfully');
    }
}
