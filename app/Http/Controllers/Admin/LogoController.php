<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
class LogoController extends Controller
{
    public function index(){
        return view('admin.dashboard.logo');
    }
    public function update(Request $request)
    {
    // Validate the request
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules
    ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

        // Use a unique filename for the uploaded image
            $fileName = time() . '_' . $image->getClientOriginalName();

        // Store the image in a public disk (adjust as necessary)
            $destinationPath = public_path('admin/dist/img');
            $image->move($destinationPath, $fileName);

        // Fetch the existing logo record and update it
        $logo = Logo::first(); // Consider using `firstOrFail()` for better error handling
        if ($logo) {
            $logo->name = $fileName;
            $saved = $logo->save();
            if ($saved) {
                return redirect()->route('logo')->with('msg','Logo Updated !');
            }
        } else {
            return redirect()->route('logo')->with('msg','Logo Updated !');
        }
    }

    return redirect('/logo')->with('error', 'No image uploaded');
}

}
