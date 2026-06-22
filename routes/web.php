<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\EventPhotoController;
use App\Http\Controllers\Api\EventPhotosApiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/focus', [HomeController::class, 'focus'])->name('focus');
Route::get('/who-we-are', [HomeController::class, 'whoWeAre'])->name('who-we-are');
Route::get('/our-work', [HomeController::class, 'ourWork'])->name('our-work');
Route::get('/information-resources', [HomeController::class, 'informationResources'])->name('information-resources');
Route::get('/approach', [HomeController::class, 'approach'])->name('approach');
Route::get('/mission', [HomeController::class, 'mission'])->name('mission');
Route::get('/agm', [HomeController::class, 'agm'])->name('agm');

// Information Resources sub-pages
Route::get('/videos', [App\Http\Controllers\HomeController::class, 'videos'])->name('videos');
Route::get('/research-briefs', [App\Http\Controllers\HomeController::class, 'research'])->name('research');
Route::get('/reports', [App\Http\Controllers\HomeController::class, 'reports'])->name('reports');
Route::get('/posters', [App\Http\Controllers\HomeController::class, 'posters'])->name('posters');
Route::get('/articles', [App\Http\Controllers\HomeController::class, 'articles'])->name('articles');
Route::get('/papers', [App\Http\Controllers\HomeController::class, 'papers'])->name('papers');
Route::get('/policy-briefs', [App\Http\Controllers\HomeController::class, 'policyBriefs'])->name('policy-briefs');
Route::get('/e-learning', [App\Http\Controllers\HomeController::class, 'eLearning'])->name('e-learning');
Route::get('/audio', [App\Http\Controllers\HomeController::class, 'audio'])->name('audio');
Route::get('/relevant-sites', [App\Http\Controllers\HomeController::class, 'relevantSites'])->name('relevant-sites');

// Legacy route support
Route::get('/infovid', [App\Http\Controllers\HomeController::class, 'videos'])->name('infovid');

// Download tracking
Route::get('/track-download', [DownloadController::class, 'trackDownload'])->name('track-download');

// Hidden login access route
Route::get('/admin-access', function () {
    return redirect()->route('login');
})->name('admin-access');

// API routes for event photos
Route::get('/api/event-photos/{slug}', [EventPhotosApiController::class, 'getCategoryPhotos']);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('events', EventController::class);
        Route::delete('events/recent/{id}', [EventController::class, 'destroyRecent'])->name('events.recent.destroy');
        Route::resource('logos', LogoController::class);
    });
    
    // Event Photo Management routes
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('event-photos', [EventPhotoController::class, 'index'])->name('event-photos.index');
        
        // Category management
        Route::get('event-photos/categories/create', [EventPhotoController::class, 'createCategory'])->name('event-photos.categories.create');
        Route::post('event-photos/categories', [EventPhotoController::class, 'storeCategory'])->name('event-photos.categories.store');
        Route::get('event-photos/categories/{category}/edit', [EventPhotoController::class, 'editCategory'])->name('event-photos.categories.edit');
        Route::put('event-photos/categories/{category}', [EventPhotoController::class, 'updateCategory'])->name('event-photos.categories.update');
        Route::delete('event-photos/categories/{category}', [EventPhotoController::class, 'deleteCategory'])->name('event-photos.categories.delete');
        
        // Photo management
        Route::get('event-photos/categories/{categoryId}/photos/create', [EventPhotoController::class, 'createPhoto'])->name('event-photos.photos.create');
        Route::post('event-photos/categories/{categoryId}/photos', [EventPhotoController::class, 'storePhoto'])->name('event-photos.photos.store');
        Route::get('event-photos/photos/{photo}/edit', [EventPhotoController::class, 'editPhoto'])->name('event-photos.photos.edit');
        Route::put('event-photos/photos/{photo}', [EventPhotoController::class, 'updatePhoto'])->name('event-photos.photos.update');
        Route::delete('event-photos/photos/{photo}', [EventPhotoController::class, 'deletePhoto'])->name('event-photos.photos.delete');
    });
});

require __DIR__.'/auth.php';
