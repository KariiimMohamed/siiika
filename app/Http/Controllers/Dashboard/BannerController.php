<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{  
    
    public function index()
    {
            $banners = Banner::get();
            // dd('dd');
            return view('dashboard.backend.banners.index' , compact('banners'));
    }

    
    public function create()
    {
        return view('dashboard.backend.banners.create');

    }

   
    public function store(BannerRequest $request)
    {
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('banners');
        }
        Banner::create($data);
   
        return redirect(route('admin.banners.index'))->with('success', 'Data Created Successfully');
        
    }

    
    public function show(string $id)
    {
        //
    }

   
    
    public function edit(string $id)
    { 
        $banner = Banner::where('id' , $id)->first();
        return view('dashboard.backend.banners.edit' , compact('banner'));

    }


   
    public function update(BannerRequest $request, string $id)
    {
        $banner = Banner::where('id' , $id)->first();
        $data = $request->except('img');

        if ($request->hasFile('img')) {
            Storage::delete($banner->img);
            $data['img'] = $request->file('img')->store('banners');

        }else {
            $data['img'] = $banner->img;
        }
        $banner->update($data);
        return redirect(route('admin.banners.index'))->with('success', 'Data Created Successfully');
        
    }

   
    public function destroy(string $id)
    {
        $banner = Banner::where('id' , $id)->delete();
        return redirect(route('admin.banners.index'))->with('success', 'Data Deleted Successfully');
    }
}
