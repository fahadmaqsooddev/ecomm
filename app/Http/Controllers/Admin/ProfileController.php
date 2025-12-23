<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;
class ProfileController extends Controller
{
    public function create(){
        $data=Auth::guard('admin')->user();
        return view('admin.dashboard.profiles.profile',compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'image'=>'nullable|mimes:jpg,png',
            'password' => 'nullable|numeric' // Ensure password is numeric if provided
        ]);
        $user_id=Auth::guard('admin')->user()->id;
        $data=Admin::find($user_id);
        $data->name=$request->name;
        if(isset($request->password) && !empty($request->password)){
            $data->password=Hash::make($request->password);
        }
        if($request->has('image')){
            $image=$request->file('image');
            $destination_path="admin/dist/img/";
            $fileName=$image->getClientOriginalName();
            $image->move($destination_path,$fileName);
            $data->image=$fileName;
        }
        $saved=$data->save();
        if($saved){
            //echo"Data Saved";
            return redirect()->route('profile')->with('msg','Profile Updated');
        }else{
            return redirect()->route('profile')->with('msg','Something Went Wrong');
        }
    }
}
