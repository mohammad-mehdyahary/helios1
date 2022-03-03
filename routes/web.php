<?php

use Illuminate\Support\FacaDes\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Auth::routes(['verify' => true]);
// Socialite route
Route::get('/auth/redirect/{provider}', [App\Http\Controllers\SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [App\Http\Controllers\SocialController::class, 'callback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('password.change');
Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('password.update');
Route::get('/user/logout', [App\Http\Controllers\HomeController::class, 'Logout'])->name('user.logout');

//  admin 
Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('admin', [App\Http\Controllers\Admin\LoginController::class, 'showLoginFrom'])->name('admin.login');
Route::post('admin', [App\Http\Controllers\Admin\LoginController::class, 'login']);

Route::get('admin/logout', [App\Http\Controllers\AdminController::class, 'Logout'])->name('admin.logout');
Route::get('admin/password/reset',  [App\Http\Controllers\Admin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin-password/email',  [App\Http\Controllers\Admin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/reset/password/{token}',  [App\Http\Controllers\Admin\ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/update/reset',  [App\Http\Controllers\Admin\ResetPasswordController::class, 'reset'])->name('admin.reset.update');
Route::get('/admin/Change/Password', [App\Http\Controllers\AdminController::class, 'ChangePassword'])->name('admin.password.change');
Route::post('/admin/password/update', [App\Http\Controllers\AdminController::class, 'Update_pass'])->name('admin.password.update'); 

// Admin section
// category
Route::get('admin/categories', [App\Http\Controllers\Admin\Category\CategoryController::class, 'category'])->name('categories');
Route::post('admin/store/category', [App\Http\Controllers\Admin\Category\CategoryController::class, 'storecategory'])->name('store.category');
Route::get('delete/category/{id}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'Deletecategory']);
Route::get('edit/category/{id}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'Editcategory']);
Route::post('update/category/{id}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'Updatecategory']);
// brands
Route::get('admin/brands', [App\Http\Controllers\Admin\Category\BrandController::class, 'brand'])->name('brands');
Route::post('admin/store/brand', [App\Http\Controllers\Admin\Category\BrandController::class, 'storebrand'])->name('store.brand');
Route::get('delete/brand/{id}', [App\Http\Controllers\Admin\Category\BrandController::class, 'DeleteBrand']);
Route::get('edit/brand/{id}', [App\Http\Controllers\Admin\Category\BrandController::class, 'EditBrand']);
Route::post('update/brand/{id}', [App\Http\Controllers\Admin\Category\BrandController::class, 'UpdateBrand']);
// sub categories
Route::get('admin/sub/category', [App\Http\Controllers\Admin\Category\SubCategoryController::class, 'subcategories'])->name('sub.categories');
Route::post('admin/store/subcat', [App\Http\Controllers\Admin\Category\SubCategoryController::class, 'storesubcat'])->name('store.subcategory');
Route::get('delete/subcategory/{id}', [App\Http\Controllers\Admin\Category\SubCategoryController::class, 'DeleteSubcat']);
Route::get('edit/subcategory/{id}', [App\Http\Controllers\Admin\Category\SubCategoryController::class, 'EditSubcat']);
Route::post('update/subcategory/{id}', [App\Http\Controllers\Admin\Category\SubCategoryController::class, 'UpdateSubcat']);
// coupon
Route::get('admin/sub/coupon', [App\Http\Controllers\Admin\Category\CouponController::class, 'Coupon'])->name('admin.coupon');
Route::post('admin/store/coupon', [App\Http\Controllers\Admin\Category\CouponController::class, 'StoreCoupon'])->name('store.coupon');
Route::get('delete/coupon/{id}', [App\Http\Controllers\Admin\Category\CouponController::class, 'DeleteCoupon']);
Route::get('edit/coupon/{id}', [App\Http\Controllers\Admin\Category\CouponController::class, 'EditCoupon']);
Route::post('update/coupon/{id}', [App\Http\Controllers\Admin\Category\CouponController::class, 'UpdateCoupon']);
// newslater
Route::get('admin/newslater', [App\Http\Controllers\Admin\Category\CouponController::class, 'Newslater'])->name('admin.newslater');
Route::delete('/deleteall', [App\Http\Controllers\Admin\Category\CouponController::class, 'DeleteAll'])->name('deleteall');
Route::get('delete/sub/{id}', [App\Http\Controllers\Admin\Category\CouponController::class, 'DeleteSub']);
// for show sub category with ajax
Route::get('get/subcategory/{category_id}', [App\Http\Controllers\Admin\ProductController::class, 'GetSubcat']);


// product all route
Route::get('admin/product/all', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('all.product');
Route::get('admin/product/add', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('add.product');
Route::post('admin/store/product', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store.product');

Route::get('inactive/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'inactive']);
Route::get('active/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'active']);
Route::get('delete/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'DeleteProduct']);
Route::get('view/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'ViewProduct']);
Route::get('edit/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'EditProduct']);
Route::post('update/product/withoutphoto/{id}', [App\Http\Controllers\Admin\ProductController::class, 'UPWP']);
Route::post('update/product/photo/{id}', [App\Http\Controllers\Admin\ProductController::class, 'UPP']);
// blog admin all
Route::get('blog/category/list', [App\Http\Controllers\Admin\PostController::class, 'BlogCatList'])->name('add.blog.categorylist');
Route::post('admin/store/blog', [App\Http\Controllers\Admin\PostController::class, 'BlogCatStore'])->name('store.blog.category');
Route::get('delete/blogcategory/{id}', [App\Http\Controllers\Admin\PostController::class, 'DeleteBlogCat']);
Route::get('edit/blogcategory/{id}', [App\Http\Controllers\Admin\PostController::class, 'EditBlogCat']);
Route::post('update/blog/category/{id}', [App\Http\Controllers\Admin\PostController::class, 'UpdateBlogCat']);

Route::get('admin/add/post', [App\Http\Controllers\Admin\PostController::class, 'Create'])->name('add.blogpost');
Route::get('admin/all/post', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('all.blogpost');
Route::post('admin/store/post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('store.post');
Route::get('delete/post/{id}', [App\Http\Controllers\Admin\PostController::class, 'DeletePost']);
Route::get('edit/post/{id}', [App\Http\Controllers\Admin\PostController::class, 'EditPost']);
Route::post('update/post/{id}', [App\Http\Controllers\Admin\PostController::class, 'UpdatePost']);

// frontend all route
Route::post('store/newslater', [App\Http\Controllers\FrontController::class, 'StoreNewslater'])->name('store.newslater');

// add wishlist
Route::get('add/wishlist/{id}', [App\Http\Controllers\WishlistController::class, 'addWishList']);
// add to cart
Route::get('add/to/cart/{id}', [App\Http\Controllers\CartController::class, 'AddCart']);
Route::get('product/cart', [App\Http\Controllers\CartController::class, 'ShowCart'])->name('show.cart');
Route::get('check', [App\Http\Controllers\CartController::class, 'check']);
Route::get('remove/cart/{rowId}', [App\Http\Controllers\CartController::class, 'removeCart']);
Route::post('update/cart/item/', [App\Http\Controllers\CartController::class, 'UpdateCart'])->name('update.cartitem');
Route::get('/cart/product/view/{id}', [App\Http\Controllers\CartController::class, 'VeiwProduct']);
Route::post('insert/into/cart/', [App\Http\Controllers\CartController::class, 'InsertCart'])->name('insert.into.cart');
Route::get('user/checkout/', [App\Http\Controllers\CartController::class, 'Checkout'])->name('user.checkout');
Route::get('user/wishlist/', [App\Http\Controllers\CartController::class, 'Wishlist'])->name('user.wishlist');
Route::post('user/apply/coupon/', [App\Http\Controllers\CartController::class, 'Coupon'])->name('apply.coupon');
Route::get('coupon/remove/', [App\Http\Controllers\CartController::class, 'CouponRemove'])->name('coupon.remove');

Route::get('/product/detalist/{id}/{product_name}', [App\Http\Controllers\ProductController::class, 'ProductView']);
Route::post('cart/product/add/{id}', [App\Http\Controllers\ProductController::class, 'AddCart']);
// blog post
Route::get('blog/post/', [App\Http\Controllers\BlogController::class, 'Blog'])->name('blog.post');
Route::get('language/english', [App\Http\Controllers\BlogController::class, 'LanguageEn'])->name('language.en');
Route::get('language/farsi', [App\Http\Controllers\BlogController::class, 'LanguageFa'])->name('language.fa');
Route::get('blog/single/{id}', [App\Http\Controllers\BlogController::class, 'BlogSingle']);

// payment
Route::get('payment/page', [App\Http\Controllers\CartController::class, 'PaymentPage'])->name('payment.step');
Route::post('user/payment/process/', [App\Http\Controllers\PaymentController::class, 'PaymentProcess'])->name('payment.process');
Route::post('user/zarin/charge/', [App\Http\Controllers\PaymentController::class, 'ZarinCharge'])->name('stripe.charge');
Route::post('user/payir/charge/', [App\Http\Controllers\PaymentController::class, 'Payir'])->name('payir.charge');

// product detalis
Route::get('products/{id}', [App\Http\Controllers\ProductController::class, 'ProductsView']);
Route::get('allcategory/{id}', [App\Http\Controllers\ProductController::class, 'CategoryView']);
// admin order route
Route::get('admin/pading/orders', [App\Http\Controllers\Admin\OrderController::class, 'NewOrder'])->name('admin.neworder');
Route::get('admin/view/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'ViewOrder']);
Route::get('admin/payment/accept/{id}', [App\Http\Controllers\Admin\OrderController::class, 'PaymentAccept']);
Route::get('admin/payment/cancel/{id}', [App\Http\Controllers\Admin\OrderController::class, 'PaymentCancel']);

Route::get('admin/accept/payment', [App\Http\Controllers\Admin\OrderController::class, 'AcceptPayment'])->name('admin.accept.payment');
Route::get('admin/cancel/order', [App\Http\Controllers\Admin\OrderController::class, 'CancelOrder'])->name('admin.cancel.order');
Route::get('admin/process/payment', [App\Http\Controllers\Admin\OrderController::class, 'ProseccPayment'])->name('admin.process.payment');
Route::get('admin/success/payment', [App\Http\Controllers\Admin\OrderController::class, 'SuccessPayment'])->name('admin.success.payment');
Route::get('admin/delevery/process/{id}', [App\Http\Controllers\Admin\OrderController::class, 'DeleveryProcess']);
Route::get('admin/delevery/done/{id}', [App\Http\Controllers\Admin\OrderController::class, 'DeleveryDone']);
// seo
Route::get('admin/seo', [App\Http\Controllers\Admin\OrderController::class, 'Adminseo'])->name('admin.seo');
Route::post('admin/seo/update', [App\Http\Controllers\Admin\OrderController::class, 'Updateseo'])->name('update.seo');
// order  tracking
Route::post('order/tracking', [App\Http\Controllers\FrontController::class, 'OrderTracking'])->name('order.tracking');
// order repot
Route::get('admin/today/order', [App\Http\Controllers\Admin\ReportController::class, 'TodayOrder'])->name('today.order');
Route::get('admin/today/delivery', [App\Http\Controllers\Admin\ReportController::class, 'TodayDelivery'])->name('today.delivery');
Route::get('admin/this/month', [App\Http\Controllers\Admin\ReportController::class, 'ThisMonth'])->name('this.month');
Route::get('admin/search/report', [App\Http\Controllers\Admin\ReportController::class, 'SearchReport'])->name('search.report');
Route::post('admin/search/by/year', [App\Http\Controllers\Admin\ReportController::class, 'SearchByYear'])->name('search.by.year');
Route::post('admin/search/by/month', [App\Http\Controllers\Admin\ReportController::class, 'SearchByMonth'])->name('search.by.month');
Route::post('admin/search/by/date', [App\Http\Controllers\Admin\ReportController::class, 'SearchByDate'])->name('search.by.date');
// admin role route
Route::get('admin/all/user', [App\Http\Controllers\Admin\UserRoleController::class, 'AdminAllUser'])->name('admin.all.user');
Route::get('admin/create/admin', [App\Http\Controllers\Admin\UserRoleController::class, 'CreateAdmin'])->name('create.admin');
Route::post('admin/store/admin', [App\Http\Controllers\Admin\UserRoleController::class, 'StoreAdmin'])->name('store.admin');
Route::get('delete/admin/{id}', [App\Http\Controllers\Admin\UserRoleController::class, 'UserDelete']);
Route::get('edit/admin/{id}', [App\Http\Controllers\Admin\UserRoleController::class, 'UserEdit']);
Route::post('admin/update/admin', [App\Http\Controllers\Admin\UserRoleController::class, 'UpdateAdmin'])->name('update.admin');
// admin site setting
Route::get('admin/site/setting', [App\Http\Controllers\Admin\SettingController::class, 'AdminSiteSetting'])->name('admin.site.setting');
Route::post('admin/sitesetting', [App\Http\Controllers\Admin\SettingController::class, 'UpdateSiteSetting'])->name('update.sitesetting');
// return order route
Route::get('success/list/', [App\Http\Controllers\PaymentController::class, 'SuccessOrderlist'])->name('success.orderlist');
Route::get('request/return/{id}', [App\Http\Controllers\PaymentController::class, 'RequestReturn']);

Route::get('admin/return/request', [App\Http\Controllers\Admin\ReturnController::class, 'ReturnRequest'])->name('admin.return.request');
Route::get('admin/approve/return/{id}', [App\Http\Controllers\Admin\ReturnController::class, 'ApproveReturn']);
Route::get('admin/all/return', [App\Http\Controllers\Admin\ReturnController::class, 'AllReturn'])->name('admin.all.return');
// order stock route
Route::get('admin/product/stock', [App\Http\Controllers\Admin\UserRoleController::class, 'AdminProductStock'])->name('admin.product.stock');
// contact page route
Route::get('contact/page', [App\Http\Controllers\ContactController::class, 'ContactPage'])->name('contact.page');
Route::post('contact/form', [App\Http\Controllers\ContactController::class, 'ContactFrom'])->name('contact.form');
Route::get('all/message', [App\Http\Controllers\ContactController::class, 'AllMessage'])->name('all.message');
// search route
Route::post('product/search', [App\Http\Controllers\CartController::class, 'ProductSearch'])->name('product.search');

// zarinpal
