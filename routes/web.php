<?php

use App\Http\Controllers\AdminPanel\AdminProductController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\FaqController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\MessageController;
use App\Http\Controllers\AdminPanel\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|  Test Comment
*/
// 1- Do something in route
Route::get('/hello', function () {
    return 'Hello World';
});

//2- Call view in route
Route::get('/welcome', function () {
    return view('welcome');
});

// ******************** HOME PAGE  ROUTES *************************
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/references',[HomeController::class,'references'])->name('references');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('/storemessage',[HomeController::class,'storemessage'])->name('storemessage');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::post('/storecomment',[HomeController::class,'storecomment'])->name('storecomment');
Route::view('/loginuser', 'home.login')->name('loginuser');;
Route::view('/registeruser', 'home.register')->name('registeruser');;
Route::get('/logoutuser', [HomeController::class,'logout'])->name('logoutuser');
Route::view('/loginadmin', 'admin.login')->name('loginadmin');
Route::post('/loginadmincheck', [HomeController::class,'loginadmincheck'])->name('loginadmincheck');

//4- Route-> Controller->View
Route::get('/test',[HomeController::class,'test'])->name('test');

//5- Route wih parameters
Route::get('/param/{id}/{number}',[HomeController::class,'param'])->name('param');
//6 Route with post
Route::post('/save',[HomeController::class,'save'])->name('save');

Route::get('/product/{id}',[HomeController::class,'product'])->name('product');
Route::get('/categoryproducts/{id}/{slug}',[HomeController::class,'categoryproducts'])->name('categoryproducts');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ******************** USER AUTH CONTROL *************************
Route::middleware('auth')->group(function () {
    // ******************** USER PANEL ROUTES *************************
    Route::prefix('userpanel')->name('userpanel.')->controller(UserController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/reviews','reviews')->name('reviews');
        Route::get('/reviewdestroy/{id}','reviewdestroy')->name('reviewdestroy');
        Route::get('/orders','orders')->name('orders');
        Route::get('/orderdetail/{id}','orderdetail')->name('orderdetail');
        Route::get('/cancelproduct/{id}','cancelproduct')->name('cancelproduct');
    });

    // ******************** ShopCart ROUTES *************************
    Route::prefix('/shopcart')->name('shopcart.')->controller(ShopCartController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/add/{id}','add')->name('add');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::get('/show/{id}','show')->name('show');
        Route::post('/order','order')->name('order');
        Route::post('/storeorder','storeorder')->name('storeorder');
        Route::get('/ordercomplete','ordercomplete')->name('ordercomplete');
    });

    // ******************** ADMIN PANEL  ROUTES *************************
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/',[AdminHomeController::class,'index'])->name('index');
        // ******************** General Routes ROUTES *************************
        Route::get('/setting',[AdminHomeController::class,'setting'])->name('setting');
        Route::post('/setting',[AdminHomeController::class,'settingUpdate'])->name('setting.update');
        // ******************** ADMIN CATEGORY  ROUTES *************************
        Route::prefix('/category')->name('category.')->controller(AdminCategoryController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/show/{id}','show')->name('show');
        });

        // ******************** ADMIN PRODUCT  ROUTES *************************
        Route::prefix('/product')->name('product.')->controller(AdminProductController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/show/{id}','show')->name('show');
        });

        // ******************** ADMIN PRODUCT IMAGE GALLERY  ROUTES *************************
        Route::prefix('/image')->name('image.')->controller(ImageController::class)->group(function () {
            Route::get('/{pid}','index')->name('index');
            Route::post('/store/{pid}','store')->name('store');
            Route::get('/destroy/{pid}/{id}','destroy')->name('destroy');

        });

        // ******************** ADMIN MESSAGE  ROUTES *************************
        Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');

        });

        // ******************** ADMIN FAQ ROUTES *************************
        Route::prefix('/faq')->name('faq.')->controller(FaqController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/show/{id}','show')->name('show');
        });

        // ******************** ADMIN COMMENT  ROUTES *************************
        Route::prefix('/comment')->name('comment.')->controller(CommentController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');

        });

        // ******************** ADMIN USER  ROUTES *************************
        Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/edit/{id}','show')->name('edit');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::post('/addrole/{id}','addrole')->name('addrole');
            Route::get('/destroyrole/{uid}/{rid}','destroyrole')->name('destroyrole');
        });

        // ******************** ADMIN ORDERS ROUTES *************************
        Route::prefix('/order')->name('order.')->controller(OrderController::class)->group(function () {
            Route::get('/{slug}','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/show/{id}','show')->name('show');
            Route::get('/cancelorder/{id}','cancelorder')->name('cancelorder');
            Route::get('/cancelproduct/{id}','cancelproduct')->name('cancelproduct');
            Route::get('/acceptproduct/{id}','acceptproduct')->name('acceptproduct');
        });

    }); // Admin Panel Routes group

}); // User auth. Group
