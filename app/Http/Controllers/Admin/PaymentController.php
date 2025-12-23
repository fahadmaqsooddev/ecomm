<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller
{
    public function index(){
        $payments=Payment::paginate(10);
        return view('admin.dashboard.payments.index',compact('payments'));
    }
}
