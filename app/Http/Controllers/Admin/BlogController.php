<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.blogs.index',compact('blogs'));
    }
    public function create(){
        return view('admin.dashboard.blogs.add-blog');
    }
    public function store(BlogRequest $request){
        $blog=new Blog;
        $blog->heading=$request->heading;
        $blog->description=$request->description;
        if($request->has('image')){
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);
            $blog->image=$fileName;
        }
        //$product->price = $request->price;
        // Set other category properties as needed
        $saved=$blog->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('blog')->with('msg', 'Blog Added !');    
        }
    }

    public function edit(Blog $blog){
        return view('admin.dashboard.blogs.edit-blog',compact('blog'));
    }

    public function update(BlogRequest $request,Blog $blog)
    {
        $blog->heading=$request->heading;
        $blog->description=$request->description;
        if($request->has('image')){
            $image=$request->file('image');
            // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);
            $blog->image=$fileName;
        }
        //$product->price = $request->price;
        // Set other category properties as needed
        $saved=$blog->save();
        if($saved){
            // Redirect or return a response
            return redirect()->route('blog')->with('msg', 'Blog Updated !');    
        }
    }

    public function delete(Blog $blog){
        //dd($category);
        $deleted=$blog->delete();
        if($deleted){
             return redirect()->route('blog')->with('msg', 'Blog Deleted !');
        }

    }
    
}
