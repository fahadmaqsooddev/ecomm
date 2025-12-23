<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    public function index()
    {
        // Apply the orderBy method before pagination
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.dashboard.categories.add-category');
    }
    public function store(CategoryRequest $request)
    {
        // Create a new category
        $category = new Category();
        $category->name = $request->categoryname; // Assuming the input field is named 'name'
        // Set other category properties as needed
        if($request->has('image')){
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);
            $category->image=$fileName;
        }
        $saved=$category->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('categories')->with('msg', 'Category Added !');    
        }

    }

    public function edit(Category $category){
        return view('admin.dashboard.categories.edit-category',compact('category'));
    }
    
    public function update(CategoryRequest $request,Category $category)
    {
        $category->name = $request->categoryname; // Assuming you want to update the 'name' field
        if($request->has('image')){
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);
            $category->image=$fileName;
        }
        $updated=$category->save(); // Save the changes
        if($updated){
            // Redirect with a success message
            return redirect()->route('categories')->with('msg', 'Category Updated !');    
        }
    }

    public function delete(Category $category){
        //dd($category);
        $deleted=$category->delete();
        if($deleted){
             return redirect()->route('categories')->with('msg

                ', 'Category Deleted Successfully!');
        }

    }

}
