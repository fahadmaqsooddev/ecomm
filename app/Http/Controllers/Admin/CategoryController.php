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

            // Store inside storage/app/public/admin/dist/img
            $path = $image->storeAs('admin/dist/img', $fileName, 'public');

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

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();

            // Store image in 'public/admin/dist/img' using storeAs
            $path = $image->storeAs('admin/dist/img', $fileName,'public');

            // Delete old image if exists
            if($category->image && Storage::exists('admin/dist/img/'.$category->image)){
                Storage::delete('admin/dist/img/'.$category->image);
            }

            $category->image = $fileName;
        }

        $updated = $category->save();

        if($updated){
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
