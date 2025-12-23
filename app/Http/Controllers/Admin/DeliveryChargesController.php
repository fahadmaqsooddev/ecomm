<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryCharge;
class DeliveryChargesController extends Controller
{

    public function getdeliverycharges(){
        $data=DeliveryCharge::firstOrFail();
        return $data;
    }
    public function index(){
        $data=$this->getdeliverycharges();
        return view('admin.dashboard.delivery-charges.index',compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'shipping_charges' => 'nullable|numeric|min:0|max:2000',
            'tax' => 'nullable|numeric|min:0|max:30',
        ]);
        $delivery_charges=$this->getdeliverycharges();
        $delivery_charges->shipping_charges=$request->shipping_charges;
        $delivery_charges->tax=$request->tax;
        $update=$delivery_charges->save();
        if($update){
            return redirect()->back()->with('msg', 'Delivery Charges Updated Successfully.');
        }else{
            return redirect()->back()->with('msg', 'Something Went Wrong Delivery Charges Failed to Update');
        }
    }

}
