<?php

use App\Services\Newsletter;
use Illuminate\Routing\middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;

    // PostController---------------------------------------------------------------------
    Route::get('/', [PostController::class, 'index'])->name('home');

    Route::get('posts/{post:slug}', [PostController::class, 'show']);
    // PostCommentsController-------------------------------------------------------------
    Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
    // RegisterController-----------------------------------------------------------------
    Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

    Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
    // SessionController------------------------------------------------------------------
    Route::get('login', [SessionController::class, 'create'])->middleware('guest');

    Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');

    Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
    // NewsletterController---------------------------------------------------------------
    Route::post('newsletter', NewsletterController::class);
    // AdminPostController----------------------------------------------------------------
    Route::middleware('can:admin')->group(function () {
        // we can use Route::resource instead of individually typing every single post but at times this can confuze a lot of people so im gonna leave the single routes commented incase someone needs the individual ones.
        Route::resource('admin/posts', AdminPostController::class);
    });

    // Route::get('admin/posts', [AdminPostController::class, 'index']);
    // Route::post('admin/posts', [AdminPostController::class, 'store']);
    // Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    // Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    // Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    // Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
