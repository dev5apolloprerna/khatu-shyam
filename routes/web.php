<?php
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\LiveVideoMasterController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\GalleryMasterController;
use App\Http\Controllers\Admin\TimetableMasterController;
use App\Http\Controllers\Admin\VideoGalleryController;

Route::fallback(function () {
     return view('errors.404');
});

Route::get('/login', function () {
    return redirect()->route('login');
});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::get('/edit', [HomeController::class, 'EditProfile'])->name('EditProfile');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

// Users
Route::middleware('auth')->prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id?}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
    Route::post('/password-update/{Id?}', [UserController::class, 'passwordupdate'])->name('passwordupdate');
    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');
    Route::get('export/', [UserController::class, 'export'])->name('export');
});




Route::middleware(['auth'])  // add your other middleware if needed
    ->prefix('admin')
    ->name('albums.')
    ->group(function () {
        Route::get('/albums', [AlbumController::class, 'index'])->name('index');
        Route::post('/albums', [AlbumController::class, 'store'])->name('store');
        Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('update');
        Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('destroy');

        // extra endpoints
        Route::post('/albums/bulk-destroy', [AlbumController::class, 'bulkDestroy'])->name('bulk-destroy');
        Route::post('/albums/toggle-status/{album}', [AlbumController::class, 'toggleStatus'])->name('toggle-status');
    });



Route::prefix('admin')->group(function () {
    Route::get('gallery_master', [GalleryMasterController::class, 'index'])->name('admin.gallery_master.index');
    Route::post('gallery_master/store', [GalleryMasterController::class, 'store'])->name('admin.gallery_master.store');

    // ✅ correct update route
    Route::post('gallery_master/update/{id}', [GalleryMasterController::class, 'update'])->name('admin.gallery_master.update');

    Route::get('gallery_master/edit/{id}', [GalleryMasterController::class, 'edit'])->name('admin.gallery_master.edit');
    Route::post('gallery_master/delete', [GalleryMasterController::class, 'delete'])->name('admin.gallery_master.delete');
    Route::post('gallery_master/bulk-delete', [GalleryMasterController::class, 'bulkDelete'])->name('admin.gallery_master.bulk-delete');
});


Route::prefix('admin')->group(function () {
Route::get('live_video_master', [LiveVideoMasterController::class, 'index'])->name('admin.live_video_master.index');
Route::post('live_video_master/store', [LiveVideoMasterController::class, 'store'])->name('admin.live_video_master.store');
Route::get('live_video_master/edit/{id}', [LiveVideoMasterController::class, 'edit'])->name('admin.live_video_master.edit');
Route::post('live_video_master/update/{id}', [LiveVideoMasterController::class, 'update'])->name('admin.live_video_master.update');
Route::post('live_video_master/delete', [LiveVideoMasterController::class, 'delete'])->name('admin.live_video_master.delete');
Route::post('live_video_master/bulk-delete', [LiveVideoMasterController::class, 'bulkDelete'])->name('admin.live_video_master.bulk-delete');
});


Route::prefix('admin')->group(function () {

Route::get('timetable_master', [TimetableMasterController::class, 'index'])->name('admin.timetable_master.index');
Route::post('timetable_master/store', [TimetableMasterController::class, 'store'])->name('admin.timetable_master.store');
Route::get('timetable_master/edit/{id}', [TimetableMasterController::class, 'edit'])->name('admin.timetable_master.edit');
Route::post('timetable_master/update/{id}', [TimetableMasterController::class, 'update'])->name('admin.timetable_master.update');
Route::post('timetable_master/delete', [TimetableMasterController::class, 'delete'])->name('admin.timetable_master.delete');
Route::post('timetable_master/bulk-delete', [TimetableMasterController::class, 'bulkDelete'])->name('admin.timetable_master.bulk-delete');
});


Route::prefix('admin')->group(function () {

Route::get('video_gallery', [VideoGalleryController::class, 'index'])->name('admin.video_gallery.index');
Route::post('video_gallery/store', [VideoGalleryController::class, 'store'])->name('admin.video_gallery.store');
Route::get('video_gallery/edit/{id}', [VideoGalleryController::class, 'edit'])->name('admin.video_gallery.edit');
Route::post('video_gallery/update/{id}', [VideoGalleryController::class, 'update'])->name('admin.video_gallery.update');
Route::post('video_gallery/delete', [VideoGalleryController::class, 'delete'])->name('admin.video_gallery.delete');
Route::post('video_gallery/bulk-delete', [VideoGalleryController::class, 'bulkDelete'])->name('admin.video_gallery.bulk-delete');

});