<?php
use App\Http\Controllers\BannerController;
use App\Http\Controllers\frondend\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\KhoaHocController;
use App\Http\Controllers\login;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::prefix('login')->group(function (){
    route::get('/',[login::class,'login'])->name('login');
    route::post('loginprocessing',[login::class,'loginProcessing'])->name('login.processing');
    route::get('logout',[login::class,'logout'])->name('login.logout');
});
Route::prefix('/admin')->middleware(['auth', 'PreventBackHistory'])->group(function(){
Route::prefix('users')->group(function () {
    Route::put('SoftDeletes/{id}', [UserController::class, 'softDeletes'])->name('users.SoftDeletes');
    Route::get('trash', [UserController::class, 'trash'])->name('users.trash');
    Route::put('RestoreDelete/{id}', [UserController::class, 'RestoreDelete'])->name('users.RestoreDelete');
});
Route::resource('users', UserController::class);
Route::prefix('groups')->group(function () {
    Route::put('SoftDeletes/{id}', [GroupController::class, 'softDeletes'])->name('groups.SoftDeletes');
    Route::get('trash', [GroupController::class, 'trash'])->name('groups.trash');
    Route::put('RestoreDelete/{id}', [GroupController::class, 'RestoreDelete'])->name('groups.RestoreDelete');
});
Route::resource('groups', GroupController::class);
Route::prefix('khoahoc')->group(function () {
    Route::put('SoftDeletes/{id}', [KhoaHocController::class, 'softDeletes'])->name('khoahoc.SoftDeletes');
    Route::get('trash', [khoahocController::class, 'trash'])->name('khoahoc.trash');
    Route::put('RestoreDelete/{id}', [khoahocController::class, 'RestoreDelete'])->name('khoahoc.RestoreDelete');
});
Route::resource('khoahoc', khoahocController::class);
Route::get('profile', function () {
    return view('backend.users.profile');
})->name('users.profile');
Route::prefix('posts')->group(function () {
    Route::put('SoftDeletes/{id}', [PostController::class, 'softDeletes'])->name('posts.SoftDeletes');
    Route::get('trash', [PostController::class, 'trash'])->name('posts.trash');
    Route::put('RestoreDelete/{id}', [PostController::class, 'RestoreDelete'])->name('posts.RestoreDelete');
});
Route::resource('posts', PostController::class);
Route::prefix('events')->group(function () {
    Route::put('SoftDeletes/{id}', [EventController::class, 'softDeletes'])->name('events.SoftDeletes');
    Route::get('trash', [EventController::class, 'trash'])->name('events.trash');
    Route::put('RestoreDelete/{id}', [EventController::class, 'RestoreDelete'])->name('events.RestoreDelete');
});
Route::resource('banners', BannerController::class);
Route::resource('videos', VideoController::class);

});
Route::prefix('')->group(function () {
     route::get('/',[HomeController::class,'index'])->name('home.index');
     route::get('/show/{id}',[HomeController::class,'show'])->name('home.show');
     Route::prefix('su-kien')->group(function () {
     route::get('',[HomeController::class,'tintuc'])->name('home.su_kien');
     route::get('{id}',[HomeController::class,'show'])->name('home.show');
    });
    Route::prefix('thong-bao')->group(function () {
        route::get('',[HomeController::class,'thongbao'])->name('home.thong_bao');
       });
    Route::prefix('dang-Ky')->group(function () {
        route::get('',[HomeController::class,'dangky'])->name('home.dang_ky');
    });
    // Route::prefix('tho-bao')->group(function () {
    //     route::get('',[HomeController::class,'thongbao'])->name('home.thong-bao');
    // });
});

