<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    public function getcategories(){
        $categories=Category::all();
        return $categories;
    }
    public function getbrands(){
        $brands=Brand::all();
        return $brands;
    }
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.products.index', compact('products'));
    }

    public function create(){
        $categories=$this->getcategories();

        return view('admin.dashboard.products.add-product',compact('categories'));
    }

    public function store(ProductRequest $request)
{
    // Create a new product
    $product = new Product();
    $product->category_id = $request->category_id; 
    $product->name = $request->name;        
    $product->price = $request->price;
    $product->quantity=$request->quantity;
    $product->description = $request->description;

    if ($request->has('image')) {
        $image = $request->file('image');

        // Generate a unique filename for the uploaded image
        $fileName = time() . '_' . $image->getClientOriginalName();
        $destinationPath = public_path('admin/dist/img/product');

        // Check if a file with the same name already exists
        $existingImagePath = $destinationPath . '/' . $fileName;
        // if (file_exists($existingImagePath)) {
        //     // Remove the existing image file if it exists
        //     unlink($existingImagePath);
        // }

        // Store the new image
        $image->move($destinationPath, $fileName);
        $product->image = $fileName;
    }

    // Save the product
    $saved = $product->save();
    if ($saved) {
        // Redirect or return a response
        return redirect()->route('products')->with('msg', 'Product Added !');    
    }

    // Optional: Handle the case where saving fails
    return redirect()->back()->with('error', 'Failed to add product.');
}



    public function edit(Product $product){
        $categories=$this->getcategories();
        return view('admin.dashboard.products.edit-product',compact('product','categories'));
    }
    

    public function update(ProductRequest $request,Product $product)
    {
        $product->category_id = $request->category_id; 
        $product->brand_id = $request->brand_id; 
        $product->name = $request->name;        
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        if($request->has('image')){
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img/product');
            $image->move($destinationPath, $fileName);
            $product->image=$fileName;
        }
        $saved=$product->save();
        if($saved){
            return redirect()->route('products')->with('msg', 'Product Updated !');    
        }
    }

    public function delete(Product $product){
        $deleted=$product->delete();
        if($deleted){
             return redirect()->route('products')->with('msg', 'Product Deleted !');
        }

    }
}
