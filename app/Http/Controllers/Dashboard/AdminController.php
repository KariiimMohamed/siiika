<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{  
    
    public function index()
    {
        $admins = User::where('type' , 'admin')->get();
        return view('dashboard.backend.admins.index' , compact('admins'));
    }

    
    public function create()
    {
        return view('dashboard.backend.admins.create');

    }
 
   
    public function store(AdminRequest $request)
    {
        $data = $request->except('img' , 'password' , 'type');
        $data['type']  = 'admin' ;
        $data['password']  = bcrypt($request->password) ;
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('admins');
        }
        User::create($data);
        return redirect(route('admin.admins.index'))->with('success', 'Data Created Successfully');
        
    }
 
    
   
    public function edit(string $id)
    { 
        $admin = User::where('id' , $id)->first();
        return view('dashboard.backend.admins.edit' , compact('admin'));

    }

   
    public function update(AdminRequest $request, string $id)
    {
        $admin = User::where('id' , $id)->first();
        $data = $request->except('img' , 'password');
        

        if ($request->hasFile('img') && $admin->img) {
            Storage::delete($admin->img);
            $data['img'] = $request->file('img')->store('admins');

        }else {
            $data['img'] = $admin->img;
        }

        if(request()->has('password') && $request->password != null){
            $data['password'] = bcrypt($request->password);
        }
        $admin->update($data);
        return redirect(route('admin.admins.index'))->with('success', 'Data Created Successfully');


    }

   
    public function destroy(string $id)
    {
        $admin = User::where('id' , $id)->delete();
        return redirect(route('admin.admins.index'))->with('success', 'Data Deleted Successfully');
    }
}
