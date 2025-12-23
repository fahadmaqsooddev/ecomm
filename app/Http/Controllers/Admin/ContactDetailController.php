<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactDetail;
use App\Http\Requests\ContactDetailRequest;
class ContactDetailController extends Controller
{
    public function create(){
        $data = ContactDetail::first();
    
        // If no record is found, set default values
        if (!$data) {
            $data = new ContactDetail(); // Create a new instance with empty values
        }
        return view('admin.dashboard.contactdetails.index', compact('data'));
    }
    
    public function store(ContactDetailRequest $request) {

        //dd($request->all());
        // Define the attributes to check for existence
        $attributes = ['email' => $request->email]; // or another unique field
    
        // Define the attributes to be updated or created
        $values = [
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website
        ];
    
        // Use updateOrCreate to insert or update the record
        $contactDetail = ContactDetail::updateOrCreate($attributes, $values);
    
        // You can return a response or redirect as needed
        return redirect()->route('contact-details')->with('msg', 'Contact details saved successfully.');
    }
    
}
