<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\DeliveryInfoController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\DeliveryChargesController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\wishListController;


//Middlewares
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\UserLoginMiddleware;
use App\Http\Middleware\EnsureCartIsNotEmpty;
use App\Http\Middleware\CheckUserLogin;
use App\Http\Middleware\RedirectIfAdminLoggedIn;

Route::get('/',[WebsiteController::class,'index'])->name('indexxxx');
Route::get('/pusher',function(){
    return view('pusher');
});


// User Authentication Routes
Route::middleware(CheckUserLogin::class)->group(function(){
    Route::get('/userregister', [WebsiteController::class, 'register'])->name('userregister');
    Route::get('/userlogin', [WebsiteController::class, 'login'])->name('userlogin');
    Route::post('user/register', [UserController::class, 'store'])->name('registration');
    Route::post('/user/login', [UserController::class, 'userlogin'])->name('usersignin');
});

// Email Verification
Route::get('/verify-email/{token}', [UserController::class, 'verifytoken'])->name('verifytoken');
// Contact Us Routes
Route::get('/contact-us', [WebsiteController::class, 'contactus'])->name('contactus');
Route::post('/contact-us', [WebsiteController::class, 'store'])->name('storecontactus');

// Newsletter Subscription
Route::post('/newsletter', [WebsiteController::class, 'newsletter'])->name('newsletter');

// Static Pages
Route::get('/aboutus', [WebsiteController::class, 'aboutus'])->name('about');
Route::get('/services', [WebsiteController::class, 'services'])->name('services');
Route::get('/blogs', [WebsiteController::class, 'blogs'])->name('blogs');
Route::get('/blog-detail/{blog}',[WebsiteController::class,'blogdetail'])->name('blogdetail');
Route::get('/brands', [WebsiteController::class, 'brands'])->name('brands');

// Category Detail
Route::get('/category/{id}', [WebsiteController::class, 'categorydetail'])->name('category');


//Search Item

Route::post('/searchitem',[WebsiteController::class, 'searchitem'])->name('searchitem');

//Product Detail

Route::get('/product/{id}', [WebsiteController::class, 'productdetail'])->name('product');

Route::get('/brands/{brand}', [WebsiteController::class, 'showProducts'])->name('brands.products');


//Reset Password

Route::get('/resetpassword', [UserController::class, 'resetpassword'])->name('resetpassword');


//Add to cart


Route::get('/search-suggestions', [WebsiteController::class, 'suggest'])->name('search.suggest');


Route::middleware(UserLoginMiddleware::class)->group(function(){
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/items', [CartController::class, 'cartdetails'])->name('cartdetails');
    Route::get('/cart/details', [CartController::class, 'cartitemsdetails'])->name('cartitemsdetails');
    Route::get('/user/logout',[UserController::class,'userlogout'])->name('userlogout');
    Route::get('/user/orders',[UserController::class,'userorders'])->name('userorders');
    Route::get('/user/order/{id}',[UserController::class,'getorderdetails'])->name('getorderdetail');
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity']);
    Route::post('/deletecart/{cart}',[CartController::class,'deletecart']);
    Route::get('/checkout',[CheckoutController::class,'index'])->middleware([EnsureCartIsNotEmpty::class])->name('checkout');
    Route::post('/store-checkout',[CheckoutController::class,'checkout'])->middleware([EnsureCartIsNotEmpty::class])->name('store.checkout');
    Route::get('/latest-checkout-data',[CartController::class,'getCheckoutData'])->name('getCheckoutData');
    Route::post('/wishlist',[WishListController::class,'wishlist'])->name('wishlist');
    Route::get('/get-wishlists',[WishListController::class,'getWishlist'])->name('getwishlists');
    

});

Route::get('productdetail/{product}',[ProductDetailController::class,'product_detail'])->name('product.detail');
//Admin Routes

Route::middleware(RedirectIfAdminLoggedIn::class)->group(function () {
    Route::get('admin/login', [AdminLoginController::class,'index'])->name('login');
    Route::post('admin/login', [AdminLoginController::class,'login'])->name('login');
});

Route::middleware(CheckLoginMiddleware::class)->prefix('admin')->as('admin.')->group(function(){

    Route::get('dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
    //Payments Routes
    Route::get('payments',[PaymentController::class,'index'])->name('payments');
    //Delivery Charges Routes
    Route::get('delivery-charges',[DeliveryChargesController::class,'index'])->name('delivery-charges');
    Route::post('delivery-charges',[DeliveryChargesController::class,'update'])->name('update-delivery-charges');
    //Logo Routes
    Route::get('logo',[LogoController::class,'index'])->name('logo');
    Route::post('logo',[LogoController::class,'update'])->name('updatelogo');

    //Categories Routes

    Route::get('categories',[CategoryController::class,'index'])->name('categories');

    Route::get('addcategory',[CategoryController::class,'create'])->name('addcategory');

    Route::post('addcategory',[CategoryController::class,'store'])->name('storecategory');

    Route::get('editcategory/{category}',[CategoryController::class,'edit'])->name('editcategory');

    Route::post('updatecategory/{category}',[CategoryController::class,'update'])->name('updatecategory');

    Route::get('deletecategory/{category}', [CategoryController::class, 'delete'])->name('deletecategory');


    //Products Routes


    Route::get('products', [ProductController::class, 'index'])->name('products');

    Route::get('addproduct', [ProductController::class, 'create'])->name('addproduct');

    Route::post('addproduct', [ProductController::class, 'store'])->name('storeproduct');

    Route::get('editproduct/{product}', [ProductController::class, 'edit'])->name('editproduct');

    Route::post('updateproduct/{product}', [ProductController::class, 'update'])->name('updateproduct');

    Route::get('deleteproduct/{product}', [ProductController::class, 'delete'])->name('deleteproduct');



    //Brands Routes


    Route::get('brands', [BrandController::class, 'index'])->name('brand');

    Route::get('addbrand', [BrandController::class, 'create'])->name('addbrand');

    Route::post('addbrand', [BrandController::class, 'store'])->name('storebrand');

    Route::get('editbrand/{brand}', [BrandController::class, 'edit'])->name('editbrand');

    Route::post('updatebrand/{brand}', [BrandController::class, 'update'])->name('updatebrand');

    Route::get('deletebrand/{brand}', [BrandController::class, 'delete'])->name('deletebrand');


    //Profile Routes

    Route::get('profile', [ProfileController::class, 'create'])->name('profile');

    Route::post('profile', [ProfileController::class, 'store'])->name('updateprofile');

    //Links Routes

    Route::get('links', [LinkController::class, 'create'])->name('links');

    Route::post('links', [LinkController::class, 'store'])->name('updatelinks');

    //Contact Details Routes

    Route::get('contact-details', [ContactDetailController::class, 'create'])->name('contact-details');

    Route::post('contact-details', [ContactDetailController::class, 'store'])->name('update-contact-details');


     //Delivery Info Routes

     Route::get('deliveryinfo',[DeliveryInfoController::class,'index'])->name('deliveryinfo');

     Route::get('adddeliveryinfo',[DeliveryInfoController::class,'create'])->name('adddeliveryinfo');
 
     Route::post('adddeliveryinfo',[DeliveryInfoController::class,'store'])->name('storedeliveryinfo');
 
     Route::get('editdeliveryinfo/{deliveryinfo}',[DeliveryInfoController::class,'edit'])->name('editdeliveryinfo');
 
     Route::post('updatedeliveryinfo/{deliveryinfo}',[DeliveryInfoController::class,'update'])->name('updatedeliveryinfo');
 
     Route::get('deletedeliveryinfo/{deliveryinfo}', [DeliveryInfoController::class, 'delete'])->name('deletedeliveryinfo');


     //Testimonial Routes

     Route::get('testimonial',[TestimonialController::class,'index'])->name('testimonial');

     Route::get('addtestimonial',[TestimonialController::class,'create'])->name('addtestimonial');
     
     Route::post('addtestimonial',[TestimonialController::class,'store'])->name('storetestimonial');
     
     Route::get('edittestimonial/{testimonial}',[TestimonialController::class,'edit'])->name('edittestimonial');
     
     Route::post('updatetestimonial/{testimonial}',[TestimonialController::class,'update'])->name('updatetestimonial');
     
     Route::get('deletetestimonial/{testimonial}', [TestimonialController::class, 'delete'])->name('deletetestimonial');

    //Blog Routes

    Route::get('blog',[BlogController::class,'index'])->name('blog');

    Route::get('addblog',[BlogController::class,'create'])->name('addblog');
    
    Route::post('addblog',[BlogController::class,'store'])->name('storeblog');
    
    Route::get('editblog/{blog}',[BlogController::class,'edit'])->name('editblog');
    
    Route::post('updateblog/{blog}',[BlogController::class,'update'])->name('updateblog');
    
    Route::get('deleteblog/{blog}', [BlogController::class, 'delete'])->name('deleteblog');

    //Service Routes

    Route::get('service',[ServiceController::class,'index'])->name('service');

    Route::get('addservice',[ServiceController::class,'create'])->name('addservice');
    
    Route::post('addservice',[ServiceController::class,'store'])->name('storeservice');
    
    Route::get('editservice/{service}',[ServiceController::class,'edit'])->name('editservice');
    
    Route::post('updateservice/{service}',[ServiceController::class,'update'])->name('updateservice');
    
    Route::get('deleteservice/{service}', [ServiceController::class, 'delete'])->name('deleteservice');



     //ContactUs Routes

    Route::get('contactus', [ContactUsController::class, 'index'])->name('allcontacts');
    Route::get('viewcontactus/{contact}', [ContactUsController::class, 'view'])->name('contactview');

     //Subcribers Routes

    Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers');

    //AboutUs Routes
    Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus');
    Route::post('aboutus', [AboutUsController::class, 'update'])->name('updateaboutus');

    //Logout Routes
    Route::get('logout',[AdminLoginController::class,'logout'])->name('logout');

    //Order Routes

    Route::get('orders',[OrderController::class,'index'])->name('orders');
    Route::get('orders/{order}',[OrderController::class,'view'])
    ->whereNumber('order')
    ->name('orderview');
    Route::post('orders/toggle-status', [OrderController::class, 'toggleStatus'])
    ->name('orders.toggle-status');
    
    

});


Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});






