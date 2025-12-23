<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactUsController extends Controller
{
    // Method to display the contact messages
    public function index()
    {
        // Apply the orderBy method before pagination
        $contacts = Contact::orderBy('id', 'desc')->paginate(10);
        
        // Return the view with the contacts data
        return view('admin.dashboard.contactus.index', compact('contacts'));
    }
    public function view(Contact $contact){
        //$contact=Contact::find(1);
        //\Log::info('Contact view method called', ['contact' => $contact]);
        return view('admin.dashboard.contactus.view', compact('contact'));

    }
}
