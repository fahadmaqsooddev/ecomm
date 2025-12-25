<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    public function index(){
        // Apply the orderBy method before pagination
        $testimonials = Testimonial::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.testimonials.index',compact('testimonials'));
    }

    public function create(){
        return view('admin.dashboard.testimonials.add-testimonial');
    }

    public function store(TestimonialRequest $request){

        //dd($request->all());
        // Create a new category
        $testimonial = new Testimonial();
        $testimonial->heading = $request->heading;        
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;



        if($request->has('image')){
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);
            $testimonial->image=$fileName;
        }
        //$product->price = $request->price;
        // Set other category properties as needed
        $saved=$testimonial->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('admin.testimonial')->with('msg', 'Testimonial Added !');    
        }
    }

    public function edit(Testimonial $testimonial){
        return view('admin.dashboard.testimonials.edit-testimonial',compact('testimonial'));
    }


    public function update(TestimonialRequest $request,Testimonial $testimonial)
    {
        $testimonial->heading = $request->heading;        
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
    
        if($request->has('image')){
            
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);
            $testimonial->image=$fileName;
        }
        //$product->price = $request->price;
        // Set other category properties as needed
        $saved=$testimonial->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('admin.testimonial')->with('msg', 'Testimonial Updated !');    
        }
    }


    public function delete(Testimonial $testimonial){
        //dd($category);
        $deleted=$testimonial->delete();
        if($deleted){
             return redirect()->route('admin.testimonial')->with('msg', 'Testimonial Deleted !');
        }

    }
}
