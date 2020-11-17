<?php

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

Route::get('/','WebController@index')->name('index');
Route::get('/vehicle-information/{id}', 'WebController@vehicleInfo')->name('vehicle_info');
Route::get('/vehicles', 'WebController@vehicles')->name('vehicles');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', 'WebController@blog')->name('our_blog');
Route::get('/blog-information/{id}', 'WebController@blog_info')->name('blog_info');
Route::get('/blog-search-engine', 'WebController@blog_search')->name('blog_search');
Route::get('/blog-categories/{category}', 'WebController@blog_category')->name('blog_category');
Route::get('/vehicle-search-engine', 'WebController@vehicle_search')->name('vehicle_search');

// Route::get('/routes-cats-get/{id}', 'WebController@routeCats')->name('routeCats');
Route::get('/cat-routes-post/{id}', 'WebController@catRoutes')->name('catRoutes');

Route::post('/book-vehicle', 'WebController@bookVehicle')->name('bookVehicle');
Route::post('/book-payment', 'WebController@notifyForBooking')->name('notifyForBooking');
Route::post('/book-fullday', 'WebController@fulldayBooking')->name('fulldayBooking');


// Users Contact Form Page
Route::get('contact','ContactFormController@create')->name('contact_us');

// Users Contact Form Submit
Route::post('contact','ContactFormController@store');

// Check Subscriber Email
Route::post('/check-subscriber-email','NewsletterController@checkSubscriber');

// Add Subscriber Email
Route::post('/add-subscriber-email','NewsletterController@addSubscriber');



Route::match(['get', 'post'], '/admin',  'AdminController@login')->name('adminLogin');

Auth::routes(['verify' => true]);

Route::get('/','WebController@index')->name('index');

Route::group(['middleware' => ['auth','verified']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users/settings', 'HomeController@settings');
    Route::get('/check-pwd','HomeController@chkPassword');
    Route::match(['get','post'],'/users/update-pwd','HomeController@updatePassword');

    // Profile Routes (User dashboard)
    Route::get('/users/profile', 'HomeController@profile');
    Route::post('/users/update-profile','HomeController@updateprofile');

    // Order Routes (User dashboard)
    Route::get('/users/orders/view', 'HomeController@order');
    Route::get('/users/payments/view', 'HomeController@payment');
});

// Users Register Page
// Route::get('/register','UserController@userRegister');

// Users Register Form Submit
// Route::post('/register','UserController@register');

// Users Logout
Route::get('/logout','UserController@logout');

// Check if User already exists
Route::match(['GET','POST'],'/check-email','UserController@checkEmail');

// Users Login Page
// Route::get('/login','UserController@userLogin');

// Users Login Form Submit
// Route::post('/login','UserController@login');

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'as' => 'admin.'],function(){
    Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);
    Route::get('/settings','AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/update-pwd','AdminController@updatePassword');

    // Company Routes (Admin)
    Route::match(['get','post'],'/add-company','CompanyController@addCompany');
    Route::match(['get','post'],'/edit-company/{id}','CompanyController@editCompany');
    Route::match(['get','post'],'/delete-company-logo/{id}','CompanyController@deleteCompanyLogo');
    Route::match(['get','post'],'/delete-company/{id}','CompanyController@deleteCompany');
    Route::match(['get'],'/view-companies','CompanyController@viewCompanies');

    // RouteCategory Routes (Admin)
    Route::match(['get','post'],'/add-route-category','CompanyController@addRouteCategory');
    Route::match(['get','post'],'/edit-route-category/{id}','CompanyController@editRouteCategory');
    Route::match(['get','post'],'/delete-route-category/{id}','CompanyController@deleteRouteCategory');
    Route::match(['get'],'/view-route-categories','CompanyController@viewRouteCategories');
    
    // RouteCategory Routes (Admin) * new
    Route::resource('route-category' , 'RouteCategoryController');
    Route::get('route-category-delete/{id}' , 'RouteCategoryController@delete')->name('deleteRouteCat');
    
    // Route Routes (Admin)
    Route::resource('routes' , 'RouteController');
    Route::get('route-delete/{id}' , 'RouteController@delete')->name('deleteRoute');

    
    // Vehicle Routes (Admin)
    Route::match(['get','post'],'/add-vehicle','VehicleController@addVehicle');
    Route::match(['get','post'],'/edit-vehicle/{id}','VehicleController@editVehicle');
    Route::match(['get','post'],'/delete-vehicle-image/{id}','VehicleController@deleteVehicleImage');
    Route::match(['get','post'],'/delete-vehicle/{id}','VehicleController@deleteVehicle');
    Route::match(['get'],'/view-vehicles','VehicleController@viewVehicles');

    // Order Routes (Admin)
    Route::match(['get','post'],'/delete-order/{id}','OrderController@deleteOrder');
    Route::match(['get'],'/view-orders','OrderController@viewOrders');

    Route::post('attach-payment/{id}' , 'OrderController@attachpay')->name('attachpay');
    Route::get('approve-order/{id}' , 'OrderController@approveOrder')->name('approveOrder');

    Route::resource('orders' , 'OrderController');
    Route::get('order-delete/{id}' , 'OrderController@delete')->name('deleteOrder');


     // Payment (Admin)
     Route::resource('payments' , 'PaymentController');
     Route::get('approve-payment/{id}' , 'PaymentController@approvePayment')->name('approvePayment');
     
     
     // Message (Admin)
     Route::resource('messages' , 'MessageController');
     

    // Contact Mail Routes (Admin)
    Route::resource('contactmails' , 'ContactFormController');
    Route::get('contact-delete/{id}' , 'ContactFormController@delete')->name('deleteContact');


    // User Routes (Admin)
    Route::match(['get','post'],'/delete-user/{id}','UserController@deleteUser');
    Route::match(['get'],'/view-users','UserController@viewUsers');

    Route::resource('users' , 'UserController');
    Route::get('user-delete/{id}' , 'UserController@delete')->name('deleteUser');

    Route::resource('customers' , 'CustomerController');
    Route::get('customer-delete/{id}' , 'CustomerController@delete')->name('deleteCustomer');



    
});

Route::group(['middleware' => ['admin']],function(){
    // VehicleCategory Routes (Admin)
    Route::match(['get','post'],'/admin/add-category','VehicleCategoryController@addCategory');
    Route::match(['get','post'],'/admin/edit-category/{id}','VehicleCategoryController@editCategory');
    Route::match(['get','post'],'/admin/delete-category/{id}','VehicleCategoryController@deleteCategory');
    Route::match(['get'],'/admin/view-categories','VehicleCategoryController@viewCategories');

    // View Newsletter Subscribers
    Route::get('admin/view-newsletter-subscribers','NewsletterController@viewNewsletterSubscribers');
    Route::get('admin/delete-newsletter-email/{id}','NewsletterController@deleteNewsletterEmail');

});

Route::get('/logout','AdminController@logout');
Route::group(['middleware' => ['auth']],function(){
    Route::get('/dashboard','AdminController@dashboard');
    Route::get('/settings','AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/update-pwd','AdminController@updatePassword');
});

