<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminController;

Route::get('/', [App\Http\Controllers\Prop\PropController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\Prop\PropController::class, 'index'])->name('home');

// Contact and About Pages
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Routes for Authentication
Auth::routes();

Route::group(['prefix' => 'props'], function() {
    Route::get('/prop-details/{id}', [App\Http\Controllers\Prop\PropController::class, 'single'])->name('single.prop');

// Inserting Request
    Route::post('/prop-details/{id}', [App\Http\Controllers\Prop\PropController::class, 'insertRequests'])->name('insert.request');

// Saving Propertis
    Route::post('/saved-props/{id}', [App\Http\Controllers\Prop\PropController::class, 'saveProps'])->name('save.prop');

//Propertis by Type / Buy-Rent
    Route::get('/type/buy', [App\Http\Controllers\Prop\PropController::class, 'propsBuy'])->name('buy.prop');
    Route::get('/type/rent', [App\Http\Controllers\Prop\PropController::class, 'propsRent'])->name('rent.prop');

//Propertis by HomeType
    Route::get('/home-type/{hometype}', [App\Http\Controllers\Prop\PropController::class, 'propsByHomeType'])->name('homeType.prop');

//Asc - Desc - Price
    Route::get('/price-asc}', [App\Http\Controllers\Prop\PropController::class, 'priceAsc'])->name('price.asc.prop');
    Route::get('/price-desc}', [App\Http\Controllers\Prop\PropController::class, 'priceDesc'])->name('price.desc.prop');
    
// Props Searching
    Route::post('/search}', [App\Http\Controllers\Prop\PropController::class, 'searchProps'])->name('search.prop');

});

Route::group(['prefix'=> 'users'], function()
{
    // User Pages / All Request
    Route::get('/all-requests', [App\Http\Controllers\Users\UsersController::class, 'allRequests'])->name('all.request');
    Route::get('/saved-props', [App\Http\Controllers\Users\UsersController::class, 'savedProps'])->name('saved.props');
});

// Admin
Route::get('/admin/login', [App\Http\Controllers\Admins\AdminController::class, 'viewLogin'])->name('view.login')->middleware('CheckForAuth');
Route::post('/admin/check-login', [App\Http\Controllers\Admins\AdminController::class, 'checkLogin'])->name('check.login');

Route::group(['prefix'=> 'admin', 'middleware'=>'auth:admin'], function()
{
    Route::get('/index', [App\Http\Controllers\Admins\AdminController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminController::class, 'allAdmins'])->name('admins.admins');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminController::class, 'createAdmin'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminController::class, 'storeAdmin'])->name('admins.store');
   
    // HomeTypes
    Route::get('/all-hometypes', [App\Http\Controllers\Admins\AdminController::class, 'allHomeTypes'])->name('admins.hometypes');
    Route::get('/create-hometypes', [App\Http\Controllers\Admins\AdminController::class, 'createHomeTypes'])->name('hometypes.create');
    Route::post('/create-hometypes', [App\Http\Controllers\Admins\AdminController::class, 'storeHomeTypes'])->name('hometypes.store');
   
    // Update
    Route::get('/edit-hometypes/{id}', [App\Http\Controllers\Admins\AdminController::class, 'editHomeType'])->name('hometypes.edit');
    Route::post('/update-hometypes/{id}', [App\Http\Controllers\Admins\AdminController::class, 'updateHomeType'])->name('hometypes.update');
    
    //Delete
    Route::get('/delete-hometypes/{id}', [App\Http\Controllers\Admins\AdminController::class, 'deleteHomeType'])->name('hometypes.delete');

    // Requests
    Route::get('/all-requests', [App\Http\Controllers\Admins\AdminController::class, 'Requests'])->name('requests.all');

    // Props
    Route::get('/all-props', [App\Http\Controllers\Admins\AdminController::class, 'allProps'])->name('props.all');

    // Create New Props
    Route::get('/create-props', [App\Http\Controllers\Admins\AdminController::class, 'createProps'])->name('props.create');

    // Create New Gallery
    Route::get('/create-gallery', [App\Http\Controllers\Admins\AdminController::class, 'createGallery'])->name('gallery.create');
    Route::post('/create-gallery', [App\Http\Controllers\Admins\AdminController::class, 'storeGallery'])->name('store.gallery');

    // Store Props
    Route::post('/store-props', [App\Http\Controllers\Admins\AdminController::class, 'storeProps'])->name('props.store');

    // Delete Props
    Route::get('/delete-props/{id}', [App\Http\Controllers\Admins\AdminController::class, 'deleteProps'])->name('props.delete');

    

});