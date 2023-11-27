<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PusherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

Route::view('/', 'pages.index')->name('/');

Route::controller(AuthController::class)->group(function () {
    Route::prefix('auth')->group(function () {
        Route::prefix('google')->group(function () {
            Route::get('login', 'googleLogin')->name('google.login')->middleware('guest');
            Route::get('callback', 'googleHandle')->name('google.callback')->middleware('guest');
        });
        Route::post('logout', 'logout')->name('auth.logout')->middleware('auth');
    });
});

Route::view('dashboard', 'dashboard.ecommerce')
    ->name('dashboard')
    ->middleware(['auth', 'admin']);

Route::prefix('ecommerce')->group(function () {
    Route::resource('product-category', ProductCategoryController::class)
        ->middleware(['auth', 'admin'])
        ->except('show');
    Route::resource('products', ProductController::class);
    Route::resource('cart', CartController::class)
        ->middleware(['auth', 'customer'])
        ->only(['index', 'store', 'update', 'destroy']);
    Route::resource('checkout', CheckoutController::class)
        ->middleware(['auth', 'customer']);
});

// Route::controller(SignInController::class)->group(function () {
//     Route::middleware(['guest'])->group(function () {
//         Route::get('/sign-in', 'index')
//             ->name('sign-in')
//             ->middleware('guest');
//         Route::post('/sign-in', 'authenticate')
//             ->name('sign-in.auth')
//             ->middleware('guest');
//     });
//     Route::post('/sign-out', 'signOut')->name('sign-in.out');
// });

// Route::controller(SignUpController::class)->group(function () {
//     Route::middleware(['guest'])->group(function () {
//         Route::get('/sign-up', 'index')
//             ->name('sign-up')
//             ->middleware('guest');
//         Route::post('/sign-up', 'store')
//             ->name('sign-up.store')
//             ->middleware('guest');
//     });
//     Route::get('/account-activation/{id}/{code}', 'activation')->name('sign-up.activate');
// });

Route::prefix('ecommerce')->group(function () {
    Route::view('list-products', 'apps.list-products')->name('list-products')->middleware('admin');
    Route::view('payment-details', 'apps.payment-details')->name('payment-details')->middleware(['auth', 'customer']);
    Route::view('order-history', 'apps.order-history')->name('order-history')->middleware(['auth', 'customer']);
    Route::view('invoice-template', 'apps.invoice-template')->name('invoice-template')->middleware(['auth', 'customer']);
    Route::view('list-wish', 'apps.list-wish')->name('list-wish')->middleware(['auth', 'customer']);
});

Route::controller(ForumController::class)->group(function () {
    Route::prefix("forum")->group(function () {
        Route::get("", 'index')->name("forum.index")->middleware('auth');
        // Bot
        Route::get("show-bot", "showBot")->name("forum.show-bot")->middleware('auth');
        Route::post("store-bot", "storeBot")->name("forum.store-bot")->middleware('auth');
        // Forum
        Route::get("show-forum/{id}", "showForum")->name("forum.show-forum")->middleware('auth');
        Route::post("store-forum", "storeForum")->name("forum.store-forum")->middleware('auth');
    });
});

Route::controller(PusherController::class)->group(function () {
    Route::prefix('pusher')->group(function () {
        Route::post('send-message', 'sendMessage')->name('pusher.send')->middleware('auth');
    });
});

Route::resource('profile', ProfileController::class)->middleware('auth')->only(['index', 'update']);

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');

Route::prefix('error')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::prefix('blog')->group(function () {
    Route::view('index', 'apps.blog')->name('blog');
    Route::view('blog-single', 'apps.blog-single')->name('blog-single');
    Route::view('add-post', 'apps.add-post')->name('add-post')->middleware('admin');
});

Route::view('faq', 'apps.faq')->name('faq');

Route::get('layout-{light}', function ($light) {
    session()->put('layout', $light);
    session()->get('layout');
    if ($light == 'vertical-layout') {
        return redirect()->route('pages-vertical-layout');
    }
    return redirect()->route('index');
    return 1;
});

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');
