<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\ProductFeatureController;
use App\Http\Controllers\ProductTagController;
use App\Http\Controllers\ProductStatusController;
use App\Http\Controllers\ProductDataController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BuildMyPCController;
use App\Http\Controllers\LiveBitController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoadingScreenController;




use Illuminate\Support\Facades\Mail;

use App\Models\Product;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('customer/customerHome', [AuthController::class, 'customerHome']);
// Route::get('register', [AuthController::class, 'add_user']);
// Route::post('register', [AuthController::class, 'insert_user'])->name('add_user');
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);

Route::get('admin/dashboard', [DashboardController::class, 'indexadmin'])->name('dashboard');


//Public Site
Route::get('/', [LoadingScreenController::class, 'show'])->name('show');
Route::get('/loading', [LoadingScreenController::class, 'show'])->name('loading');
Route::get('/process', [LoadingScreenController::class, 'process'])->name('process');

Route::get('/get-chatbot-products', [HomeController::class, 'getChatbotProducts']);

Route::get('/home', [HomeController::class, 'homeShow'])->name('home');
Route::get('/aboutus', [PageController::class, 'aboutusShow'])->name('aboutUs');
Route::get('/blog', [PageController::class, 'blogShow'])->name('blog');
Route::get('/singleBlog', [PageController::class, 'blogSingleShow'])->name('blog.show');
Route::get('/myAcc', [MyAccountController::class, 'myAccShow'])->name('myAcc');
Route::get('/products', [ProductController::class, 'category'])->name('product.category');
Route::post('/checkOut', [CheckOutController::class, 'CheckOutShow'])->name('checkOut');
Route::get('/cart', [CartController::class, 'cartShow'])->name('cart');
Route::get('/wishlist', [CartController::class, 'wishlistShow'])->name('wishlist');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/singleProduct', [PageController::class, 'singleProduct'])->name('singleProduct');
Route::get('/get-max-price', [ProductController::class, 'getMaxPrice']);
Route::get('/api/product-images/{productId}', [ProductImageController::class, 'getProductImages']);
Route::get('/api/product-images/singlepage/{productId}', [ProductImageController::class, 'getProductImages']);

Route::get('/product-quantity/{productId}', [ProductController::class, 'getProductQuantity']);

//Build My PC
Route::get('/buildMyPC', [BuildMyPCController::class, 'buildMyPC'])->name('buildMyPC');
Route::post('/send-invoice-email', [BuildMyPCController::class, 'sendInvoiceEmail'])->name('send.invoice.email');
Route::post('/send-invoice', [BuildMyPCController::class, 'sendInvoice']);
Route::post('/send-invoice-email', [BuildMyPCController::class, 'sendInvoiceEmail']);

//Bit
Route::get('/biddings', [LiveBitController::class, 'biddings'])->name('biddings');
Route::post('/place-bid', [LiveBitController::class, 'placeBid'])->name('place.bid');

//CustomerDashboard
Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
Route::get('/bidPay', [CustomerDashboardController::class, 'bitPay'])->name('customer.bitPay');
Route::post('/bidPay/place-order', [CustomerDashboardController::class, 'placeOrder'])->name('customer.placeOrder');
Route::post('/update-account', [CustomerDashboardController::class, 'updateAccount'])->name('update-account');

Route::get('/api/product/{id}', function ($id) {
    $product = Product::find($id);
    return response()->json($product);
});

Route::post('/register', [CustomerController::class, 'register'])->name('customer.register');
//Place Order
Route::post('/checkout/process', [CheckOutController::class, 'processCheckout'])->name('checkout.process');

Route::get('/checkout-success', [OrderController::class, 'orderSuccess'])->name('checkout.success');

//Dashboard
Route::get('admin/addProduct', [ProductDataController::class, 'addProduct'])->name('addProduct');
Route::post('/products/store', [ProductDataController::class, 'store'])->name('storeProduct');
Route::get('admin/addImage', [ProductImageController::class, 'addImage'])->name('addImage');
Route::post('/store-image', [ProductImageController::class, 'storeImage'])->name('storeImage');


Route::get('admin/addFeature', [ProductFeatureController::class, 'addFeature'])->name('addFeature');
Route::post('/store-feature', [ProductFeatureController::class, 'store'])->name('storeFeature');


Route::get('admin/manageProduct', [ProductDataController::class, 'manageProduct'])->name('manageProduct');
Route::post('/update-product-status', [ProductDataController::class, 'updateProductStatus'])->name('updateProductStatus');

Route::get('/product/update/{id}', [ProductDataController::class, 'edit'])->name('product.edit');
Route::put('/products/{id}', [ProductDataController::class, 'update'])->name('updateProduct');

Route::get('/product/view/{id}', [ProductDataController::class, 'viewMore'])->name('product.view');
Route::delete('/admin/deleteImage/{id}', [ProductImageController::class, 'destroy'])->name('image.destroy');


Route::get('/product/{id}/features', [ProductFeatureController::class, 'showFeatures'])->name('product.features');
Route::put('/features/{id}', [ProductFeatureController::class, 'update'])->name('features.update');
Route::delete('/admin/deleteFeature/{id}', [ProductFeatureController::class, 'deleteFeature'])->name('admin.deleteFeature');

Route::get('admin/manageCustomer', [CustomerController::class, 'manageCustomer'])->name('manageCustomer');

Route::get('admin/viewOrder', [OrderController::class, 'viewOrder'])->name('viewOrder');

Route::get('/order/view/{id}', [OrderController::class, 'viewOrderDetails'])->name('order.view');


//Customer login
// Post login route for handling form submission
Route::post('loginCustomer', [CustomerController::class, 'login'])->name('login.post');

// Logout Route
Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');

//Logout For Admin
Route::get('/logoutAdmin', [AuthController::class, 'logout'])->name('logoutAdmin');


//Payment Gateway

Route::get('/payment', [CheckOutController::class, 'initializePayment'])->name('payment.init');
Route::get('/payment/return', [CheckOutController::class, 'handleReturn'])->name('payment.return');
Route::get('/payment/cancel', [CheckOutController::class, 'handleCancel'])->name('payment.cancel');
Route::post('/payment/notify', [CheckOutController::class, 'handleNotify'])->name('payment.notify');


// routes/web.php
Route::get('/payment/form', [CheckOutController::class, 'showPaymentForm'])->name('payment.form');


//Profile manage admin
Route::middleware(['auth'])->group(function () {
    Route::get('/manage-profile', [UserController::class, 'manageProfile'])->name('manageProfile'); // Display the user profile
    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile'); // Update the user profile
});


//Manage Blog
Route::get('admin/addBlog', [BlogController::class, 'addBlog'])->name('addBlog');
Route::post('/store-blog', [BlogController::class, 'store'])->name('storeBlog');
Route::get('admin/manageBlog', [BlogController::class, 'manageBlog'])->name('manageBlog');
Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('editBlog');
Route::post('/blogs/update/{id}', [BlogController::class, 'update'])->name('updateBlog');


//Review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{product_id}', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/manageReview', [ReviewController::class, 'manageReview'])->name('manageReview');
Route::patch('/admin/review/{id}/toggle', [ReviewController::class, 'toggleReviewStatus'])->name('toggleReviewStatus');

//Contact Us
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
