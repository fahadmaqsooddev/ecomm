<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Log;
use Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get counts for categories, products, and brands
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $brands = Brand::all()->count();
        
        // Prepare data to be passed to the view
        $data = [$categories, $products, $brands];

        // Log information about the authenticated admin (e.g., their name or id)
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin user

        // // dd();
        // // die;
        if ($admin) {
            Log::info('Admin Logged In:', [
                'admin_id' => $admin->id,
                'admin_name' => $admin->name,
                'admin_email' => $admin->email,
            ]);
        } else {
            Log::info('No admin is logged in.');
        }

        // Return the dashboard view with data
        return view('admin.dashboard.index', compact('data'));
    }
}
