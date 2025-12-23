<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    public function create(){
        $data=Link::first();
        return view('admin.dashboard.links.link',compact('data'));
    }
    public function store(LinkRequest $request){
        //dd($request);
        $data=Link::first();
        // $user_id=Auth::user()->id;
        // $data=Admin::find($user_id);
        $data->twitter_link=$request->twitter;
        $data->facebook_link=$request->facebook;
        $data->linkedin_link=$request->linkedin;
        $data->instagram_link=$request->instagram;
        $data->youtube_link=$request->youtube;
        $saved=$data->save();
        if($saved){
            //echo"Data Saved";
            return redirect()->route('links')->with('msg','Links Updated');
        }else{
            return redirect()->route('links')->with('msg','Something Went Wrong');
        }
    }
}
