<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.services.index',compact('services'));
    }
    public function create(){
        return view('admin.dashboard.services.add-service');
    }
    public function store(ServiceRequest $request){
        //dd($request->all());

        $service=new Service;
        $service->heading=$request->heading;
        $service->description=$request->description;

        $saved=$service->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('service')->with('msg', 'Service Added !');    
        }
    }
    public function edit(Service $service){
        return view('admin.dashboard.services.edit-service',compact('service'));

    }
    public function update(ServiceRequest $request,Service $service){
        $service->heading=$request->heading;
        $service->description=$request->description;
        $saved=$service->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('service')->with('msg', 'Service Updated !');    
        }
    }
    public function delete(Service $service){
        //dd($category);
        $deleted=$service->delete();
        if($deleted){
            return redirect()->route('service')->with('msg', 'Service Added !');    
            
        }

    }
}
