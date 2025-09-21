<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('landing');

// ログイン＋メール認証
Route::get('/dashboard', function () {
    return redirect()->route('contents.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::scopeBindings()->group(function () {
        // コンテンツ
        Route::resource('contents', ContentController::class)->except(['show']);

        // 友達招待系
        Route::post('/contents/{content}/invite', [ContentController::class, 'invite'])->name('invite');
        Route::get('/contents/{content}/invite', [ContentController::class, 'inviteForm'])->name('invite.form');
        Route::delete('/contents/{content}/users/{user}', [ContentController::class, 'detachUser'])->name('detach.user');

        // URL
        Route::resource('contents.url', UrlController::class)->except(['show']);
      });
});

// 認証系
require __DIR__.'/auth.php';
