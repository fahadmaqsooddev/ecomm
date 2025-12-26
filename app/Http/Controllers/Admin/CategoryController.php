<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index()
    {
        // Apply the orderBy method before pagination
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.categories.index', compact('categories'));
    }

    public function create(){
        $brands=Brand::select('id','name')->orderBy('id')->get();
        return view('admin.dashboard.categories.add-category',compact('brands'));
    }
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->categoryname;
        $category->brand_id = $request->brand_id;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();

            // Store directly in public/admin/dist/img
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);

            $category->image = $fileName;
        }

        $category->save();

        return redirect()->route('admin.categories')->with('msg', 'Category Added!');
    }




    public function edit(Category $category){
         $brands=Brand::select('id','name')->orderBy('id')->get();
        return view('admin.dashboard.categories.edit-category',compact('category','brands'));
    }
    
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->categoryname;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();

            // Store image directly in public/admin/dist/img
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);

            // Delete old image if exists
            if ($category->image) {
                $oldImagePath = public_path('admin/dist/img/' . $category->image);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath); // suppress error if file doesn't exist
                }
            }

            $category->image = $fileName;
        }

        $updated = $category->save();

        if ($updated) {
            return redirect()->route('admin.categories')->with('msg', 'Category Updated!');
        }
    }


    public function delete(Category $category){
        //dd($category);
        $deleted=$category->delete();
        if($deleted){
             return redirect()->route('admin.categories')->with('msg

                ', 'Category Deleted Successfully!');
        }

    }

}
