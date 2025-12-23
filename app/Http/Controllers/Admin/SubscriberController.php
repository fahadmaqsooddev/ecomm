<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
class SubscriberController extends Controller
{
    public function index(){
        // Apply the orderBy method before pagination
        $subscribers = Subscriber::orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.subscribers.index', compact('subscribers'));
    }
}
