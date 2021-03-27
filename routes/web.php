<?php

use App\sale;
use App\Category;
use App\MarketSetting;


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

View::composer('*', function ($view) {
    // if (auth()->check()) {
        $iconsjson = file_get_contents('mdi.json');
        $icons= json_decode($iconsjson,true) ;
        $iconsjson = file_get_contents('fa.json');
        $iconsf= json_decode($iconsjson,true) ;
        $ms=MarketSetting::find(1);
        $cat=Category::all();
        foreach ($cat as $key => $c) {
            $c->images;
        }
        if(Session::has('user'))
        {
            $sales=sale::selectRaw('product_id,max(price) as price , sum(quantity) as quantity')
            ->where('user_id',session()->get('user')->id)
            ->groupBy('product_id')
            ->get();
            foreach ($sales as $key => $sale) {
                $sale->product;
                $sale->product->category;
                $sale['total']=$sale->price*$sale->quantity;
            }
            $user=session()->get('user');
        }
        else
        {
            $sales=null;
            $user=null;
        }
        $view->with(compact('icons','iconsf','ms','cat','sales','user'));

});

Route::get('hik', function () {
    return view('store2.address.dash-address-book');
    // Cookie::queue('user', $admin, 365*24*60);
    // return Cookie::get('user');
    return response()->json($request->cookie('acceptCookies'), 200);
});

//login
Route::get('admin', 'loginController@adminIndex')->name('admin.login');
Route::post('admin', 'loginController@adminPosted');
Route::group(['prefix' => 'dashboard','middleware' => 'user' , 'as' => 'dashboard.'], function(){
    Route::get('/', 'UserDashboardController@index')->name('user.dashboard');
    Route::get('/profile', 'UserDashboardController@profile')->name('user.profile');
    Route::get ('/edit/profile', 'UserDashboardController@editProfile')->name('edit.profile');
    Route::post('/edit/profile', 'UserDashboardController@storeProfile');
    Route::get('/address', 'user\AddressController@index')->name('user.address');
    Route::get('/address/default', 'user\AddressController@getDefault')->name('user.address.default');
    Route::get('/address/create', 'user\AddressController@create')->name('user.address.create');
    Route::post('/address/create', 'user\AddressController@add');
    Route::post('/address/store', 'user\AddressController@store')->name('user.address.store');
    Route::get('/address/edit/{id}', 'user\AddressController@edit')->name('user.address.edit');
    Route::get('/my/order', 'UserDashboardController@myOrders')->name('my.order');
    Route::get('/manage/order/{id}', 'UserDashboardController@myOrder')->name('manage.order');
    Route::get ('/user/change/password','UserDashboardController@getFormChangePassword')->name('users.form.change.password');
    Route::post('/user/change/password','UserDashboardController@password');
});

Route::group(['middleware' => 'admin'], function(){
    //Dashboard
    Route::get("/admin_panel", 'admin_panel\dashboardController@index')->name('admin.dashboard');
    Route::get('admin/logout', 'loginController@adminLogout')->name('admin.logout');
    //categories
    Route::get('/admin_panel/categories', 'admin_panel\categoriesController@index')->name('admin.categories');
    Route::post('/admin_panel/categories', 'admin_panel\categoriesController@posted');

    Route::get('/admin_panel/categories/edit/{id}', 'admin_panel\categoriesController@edit')->name('admin.categories.edit');
    Route::post('/admin_panel/categories/edit/{id}', 'admin_panel\categoriesController@update');

    Route::get('/admin_panel/categories/delete/{id}', 'admin_panel\categoriesController@delete')->name('admin.categories.delete');
    Route::post('/admin_panel/categories/delete/{id}', 'admin_panel\categoriesController@destroy');
    Route::post('/admin_panel/categories/add/image', 'admin_panel\categoriesController@addImage')->name('admin.categories.add.image');
    Route::get('/admin_panel/get_all_categories', 'admin_panel\categoriesController@getAllCategories');

    //products
    Route::get('/admin_panel/products', 'admin_panel\productsController@index')->name('admin.products');
    Route::get('/admin_panel/get_all_products', 'admin_panel\productsController@getAllProducts');

    Route::get('/admin_panel/products/create', 'admin_panel\productsController@create')->name('admin.products.create');
    Route::post('/admin_panel/products/create', 'admin_panel\productsController@store');

    Route::get('/admin_panel/products/edit/{id}', 'admin_panel\productsController@edit')->name('admin.products.edit');
    Route::post('/admin_panel/products/edit/{id}', 'admin_panel\productsController@update');

    Route::get('/admin_panel/products/delete/{id}', 'admin_panel\productsController@delete')->name('admin.products.delete');
    Route::post('/admin_panel/products/delete/{id}', 'admin_panel\productsController@destroy');

    //order management
    Route::get('/admin_panel/management', 'admin_panel\managementController@manage')->name('admin.orderManagement');
    Route::post('/admin_panel/management', 'admin_panel\managementController@update')->name('admin.orderUpdate');
    //Exclusive Product
    Route::get('/admin_panel/exclusive_product', 'admin_panel\ExclusiveProductController@index')->name('admin.exclusive.product');
    //Icons
    Route::get('/admin_panel/icons', 'Icons\IconController@index')->name('admin.icons');
    //Market Settings
    Route::get('/admin_panel/market/settings', 'MarketSettings\MarketSettingsController@index')->name('admin.market.settings');
    Route::post('/admin_panel/market/settings', 'MarketSettings\MarketSettingsController@store')->name('admin.market.settings');
    //Slides
    Route::get('/admin_panel/slides', 'admin_panel\SlideController@index')->name('admin.slides');
    Route::get('/admin_panel/get_all_slides', 'admin_panel\SlideController@getAllSlides');
    Route::get('/admin_panel/slides/create', 'admin_panel\SlideController@create')->name('admin.slides.create');
    Route::post('/admin_panel/slides/create', 'admin_panel\SlideController@store');
    Route::get('/admin_panel/slides/edit/{id}', 'admin_panel\SlideController@edit')->name('admin.slides.edit');
    Route::post('/admin_panel/slides/edit/{id}', 'admin_panel\SlideController@update');
    Route::get('/admin_panel/slides/delete/{id}', 'admin_panel\SlideController@destroy');

});

Route::get('/login', 'loginController@userIndex')->name('user.login');
Route::post('/login', 'loginController@userPosted');

//signup
Route::get('/signup', 'signupController@userIndex')->name('user.signup');
Route::post('/signup', 'signupController@userPosted');
Route::post('/check_email', 'signupController@emailCheck')->name('user.signup.check_email');


//user
Route::get('/', 'user\userController@index')->name('user.home');
Route::get('/product/{id}', 'user\userController@view')->name('user.product');

Route::get('/search', 'user\userController@search')->name('user.search');
Route::get('/search?c={id}', 'user\userController@view')->name('user.search.cat');



Route::get('/view/{id}', 'user\userController@view')->name('user.view');
Route::post('/view/{id}', 'user\userController@post');

Route::get('/cart', 'user\userController@cart')->name('user.cart');
Route::post('/cart', 'user\userController@confirm');
Route::post('/add-cart', 'user\userController@addToCart')->name('user.addToCart');
Route::post('/checkout-cart', 'user\userController@addToCart')->name('user.checkout');

Route::post('/edit_cart', 'user\userController@editCart')->name('user.editCart');
Route::get('/delete_item_from_cart/{id}', 'user\userController@deleteCartItem')->name('user.deleteCartItem');
Route::get('/checkout', 'user\userController@viewCheckout')->name('user.checkout');


Route::get('/logout', 'loginController@userLogout')->name('user.logout');
Route::get('/address', 'user\AddressController@index')->name('address');
Route::get('/address/{id}', 'user\AddressController@edit')->name('address.edit');
Route::get('/address/default/{id}', 'user\AddressController@editDefault')->name('address.default');
Route::post('/address/default', 'user\AddressController@storeDefault')->name('address.default.update');
Route::post('/address/delete/{id}', 'user\AddressController@delete')->name('address.delete');
Route::post('/address', 'user\AddressController@store')->name('address.save');
Route::get('/about-cookies', function(){
return view('store2.cookies');
})->name('about.cookies');
Route::group(['middleware' => 'user'], function(){
Route::get('/history', 'user\userController@history')->name('user.history');

});
