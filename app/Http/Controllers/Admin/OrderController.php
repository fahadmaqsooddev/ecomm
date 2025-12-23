<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.dashboard.orders.index', compact('orders'));
    }
    public function view(Order $order)
    {
        $order->load(['user', 'address', 'items.product']);
        return view('admin.dashboard.orders.view', compact('order'));
    }

    public function toggleStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:pending,completed',
        ]);

        $order = Order::findOrFail($request->order_id);

        // Prevent updates if already completed
        if ($order->status === 'completed') {
            return response()->json(['message' => 'Cannot change status of a completed order.'], 403);
        }

        $order->status = $request->status;
        $order->save();

        return response()->json(['message' => 'Order status updated successfully.']);
    }



}
