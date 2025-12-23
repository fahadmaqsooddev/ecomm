<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest; // Update to your BrandRequest
use App\Models\Brand; // Ensure to import the Brand model

class BrandController extends Controller
{
    public function index()
    {
        // Apply the orderBy method before pagination
        $brands = Brand::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.dashboard.brands.add-brand');
    }

    public function store(BrandRequest $request)
    {
        // Create a new brand
        $brand = new Brand();
        $brand->name = $request->name; 
        if($request->has('image')){
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);
            $brand->image=$fileName;
        }
        $saved = $brand->save();
        if ($saved) {
            // Redirect or return a response
            return redirect()->route('admin.brand')->with('msg', 'Brand Added !');    
        }
    }

    public function edit(Brand $brand)
    {
        return view('admin.dashboard.brands.edit-brand', compact('brand'));
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->name = $request->name; // Assuming you want to update the 'name' field
        if($request->has('image')){
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);
            $brand->image=$fileName;
        }
        $updated = $brand->save(); // Save the changes
        if ($updated) {
            // Redirect with a success message
            return redirect()->route('admin.brand')->with('msg', 'Brand Updated !');    
        }
    }

    public function delete(Brand $brand)
    {
        $deleted = $brand->delete();
        if ($deleted) {
            return redirect()->route('brand')->with('msg', 'Brand Deleted !');
        }
    }
}
