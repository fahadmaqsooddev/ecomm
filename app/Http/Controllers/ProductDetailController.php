<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductDetailController extends Controller
{
    public function product_detail(Product $product){
        $category_id=$product->category_id;
        $related_products=Product::where('category_id',$category_id)
        ->where('id','<>',$product->id)
        ->get();
        return view('product-detail',compact('product','related_products'));
    }
}
