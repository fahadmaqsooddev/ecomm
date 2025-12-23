<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryInfo;
use App\Http\Requests\DeliveryInfoRequest;
class DeliveryInfoController extends Controller
{
    public function index(){
        // Apply the orderBy method before pagination
        $deliveryinfo = DeliveryInfo::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.deliveryinfo.index',compact('deliveryinfo'));
    }

    public function create(){
        return view('admin.dashboard.deliveryinfo.add-delivery-info');
    }

    public function store(DeliveryInfoRequest $req ){
        $deliveryinfo=new DeliveryInfo;
        $deliveryinfo->heading=$req->heading;
        $deliveryinfo->description=$req->description;
        $saved=$deliveryinfo->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('deliveryinfo')->with('msg', 'Delivery Info Added !');    
        }
    }

    public function edit(DeliveryInfo $deliveryinfo){
        return view('admin.dashboard.deliveryinfo.edit-delivery-info',compact('deliveryinfo'));
    }

    public function update(DeliveryInfoRequest $req,DeliveryInfo $deliveryinfo)
    {
        
        $deliveryinfo->heading=$req->heading;
        $deliveryinfo->description = $req->description;
        $saved=$deliveryinfo->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('deliveryinfo')->with('msg', 'Delivery Info Updated !');    
        }
    }

    public function delete(DeliveryInfo $deliveryinfo){
        //dd($category);
        $deleted=$deliveryinfo->delete();
        if($deleted){
             return redirect()->route('deliveryinfo')->with('msg', 'Delivery Info Deleted !');
        }

    }
}
