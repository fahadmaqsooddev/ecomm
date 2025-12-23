<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        // Retrieve the first AboutUs record, or create a new instance if none exists
        $data = AboutUs::first() ?? new AboutUs();

        return view('admin.dashboard.aboutus.index', compact('data'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        // Validate the incoming request data
        $request->validate([
            'heading' => 'required|string|min:10'
        ]);

        // Find the first AboutUs record, or create a new one if none exists
        $aboutus = AboutUs::first() ?? new AboutUs();

        // Update the description
        $aboutus->heading = $request->heading;
        $aboutus->save();

        // Optionally, redirect back with a success message
        return redirect()->route('aboutus')->with('success', 'About Us information updated successfully.');
    }
}
