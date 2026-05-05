<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EmailController;

Route::get('/lang/{lang}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::get('/', [PageController::class, 'home']);

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSend'])->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::get('/exercises', [PageController::class, 'exercises'])->name('exercises');
    Route::get('/lessons/categories', [PageController::class, 'lessonCategories'])->name('lessons.categories');
    Route::get('/lessons/alphabet', [PageController::class, 'lessonAlphabet'])->name('lessons.alphabet');
    Route::get('/lessons/grammar', [PageController::class, 'lessonGrammar'])->name('lessons.grammar');
    Route::get('/lessons/vocabulary', [PageController::class, 'lessonVocabulary'])->name('lessons.vocabulary');
    Route::get('/lessons/phrases', [PageController::class, 'lessonPhrases'])->name('lessons.phrases');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::post('/login', [PageController::class, 'authenticate']);
    Route::get('/register', [PageController::class, 'register'])->name('register');
    Route::post('/register', [PageController::class, 'store']);

    Route::get('/forgot-password', [PasswordController::class, 'request'])->name('password.request');
    Route::post('/forgot-password', [PasswordController::class, 'email'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'update'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::get('/logout', [PageController::class, 'logout'])->name('logout');

    Route::middleware('role:student')->group(function () {
        Route::get('/progress', [ProgressController::class, 'showForm'])->name('progress');
        Route::post('/progress', [ProgressController::class, 'showRemaining']);
    });

    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->where('lesson', '[0-9]+')->name('lessons.show');

    Route::middleware('role:teacher')->group(function () {
        Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
        Route::post('/lessons/store', [LessonController::class, 'store'])->name('lessons.store');
        Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
        Route::put('/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    });

    Route::middleware('role:reviewer')->group(function () {
        Route::get('/lessons/{lesson}/approve', [LessonController::class, 'moderate'])->defaults('status', 'approved')->name('lessons.approve');
        Route::get('/lessons/{lesson}/reject', [LessonController::class, 'moderate'])->defaults('status', 'rejected')->name('lessons.reject');
    });

    Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    });

    Route::get('/send-email', [EmailController::class, 'showForm'])->name('email.form');
    Route::post('/send-email', [EmailController::class, 'send'])->name('email.send');

    Route::post('/profile/upload-avatar', [PageController::class, 'uploadAvatar'])->name('profile.avatar');

    Route::get('/charts', [PageController::class, 'charts'])->name('charts');
});