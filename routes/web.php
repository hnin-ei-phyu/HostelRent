<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserpostController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\UsertypeController;
use App\Http\Controllers\LeaserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LeaserpostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginWithFacebookController;
use App\Http\Controllers\InvoiceController;

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

Route::get('/', function () {
    return view('welcome');
});

//Category Route
Route::resource('category',CategoryController::class);
Route::post('/category-search',[CategoryController::class,'search'])->name('category.search');

//Room Route
Route::resource('rooms',RoomController::class);
Route::post('/rooms-search',[RoomController::class,'search'])->name('rooms.search');
Route::get('/room-details/{id}',[RoomController::class,'show'])->name('rooms.show');


//FrontendController

Route::get('/',[FrontendController::class,'welcome'])->name('front.welcome');
Route::get('/details/{id}',[FrontendController::class,'show'])->name('front.show');
Route::get('/call/{id}',[FrontendController::class,'call'])->name('front.call');
Route::post('/front-search',[FrontendController::class,'search'])->name('front.search');
Route::get('/view-leaserpost', [FrontendController::class,'post'])->name('view-leaserpost');


//Admin or Back route
//we make group route for Role and Permissions
Route::middleware('auth','admin')->group(function() {
 
    Route::get('admin/',[AdminController::class,'index'])->name('admin.index');
    
});

Auth::routes();
//Home Route
Route::get('/home', [HomeController::class, 'index'])->middleware('leaser');

Route::get('/leaser-home', [HomeController::class, 'leaserIndex'])->name('leaser-home');
Route::get('/leaser-post', [HomeController::class,'post'])->name('leaser-post');
Route::get('/detail-leaserpost/{id}', [HomeController::class,'show'])->name('detailleaserpost');
Route::get('/edit-leaserpost/{id}', [HomeController::class,'edit'])->name('editleaserpost');
Route::post('/update-leaserpost/{id}', [HomeController::class,'update'])->name('updateleaserpost');
Route::get('/user-findingpost', [HomeController::class,'finding'])->name('user-findingpost');
Route::post('/search-userfindingpost', [HomeController::class,'search'])->name('search-userfindingpost');




//User route
Route::resource('users',UserController::class);
Route::post('/users-search',[UserController::class,'search'])->name('users.search');


//UserPost
Route::resource('userposts',UserpostController::class);
Route::post('/userposts-search',[UserpostController::class,'search'])->name('userposts.search');
Route::get('/viewpost',[UserpostController::class,'viewpost'])->name('userposts.viewpost');
Route::post('/find-userpost',[UserpostController::class,'find'])->name('userposts.find');
Route::get('/userpostsdetails/{id}',[UserpostController::class,'show'])->name('userposts.show');


//Township
Route::resource('township',TownshipController::class);

//Usertype route
Route::resource('usertype',UsertypeController::class);

//Send to Email route
Route::get('send-email-pdf/{id}', [PDFController::class, 'index']);

//Socialie login with Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//Socialite login with facebook
Route::get('/redirect', [LoginWithFacebookController::class, 'redirectFacebook'])->name('facebook.login');
Route::get('/callback', [LoginWithFacebookController::class, 'facebookCallback']);


//comments
Route::post('comments-store',[CommentController::class,'store'])->name('comments.store');

//Leaser
Route::resource('leasers',LeaserController::class);
Route::get('/leaser-login',[LeaserController::class,'login'])->name('leasers.login');
Route::get('/leaser-register',[LeaserController::class,'register'])->name('leasers.register');
Route::post('/leaser-register',[LeaserController::class,'store'])->name('leasers.store');

//LeaserPost Route
Route::resource('leaserposts',LeaserpostController::class);
Route::post('/leaserposts-search',[LeaserpostController::class,'search'])->name('leaserposts.search');
Route::get('/leaserposts-details/{id}',[LeaserpostController::class,'show'])->name('leaserposts.show');

// Registration Routes...
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');


