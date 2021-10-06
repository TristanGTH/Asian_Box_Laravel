<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyUserIsAdmin;

Route::get('/', [App\Http\Controllers\Controller::class, 'accueil'])->name('accueil');

Route::get('/actualites', [ActualiteController::class, 'actualites'])->name('actualites');

Route::get('/actualites/{id}', [ActualiteController::class, 'actualite']);

Route::get('/service', [App\Http\Controllers\Controller::class, 'service'])->name('service');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendContactForm']);

Route::get('/abonnement', [AbonnementController::class, 'abonnement'])
    ->middleware('auth')
    ->name('abonnement');

Route::get('/abonnement/monthly', [AbonnementController::class, 'monthlyAbonnement'])
    ->middleware('auth')
    ->name('monthlyAbonnement');


Route::post('/abonnement/monthly', [AbonnementController::class, 'storeMonthly'])->middleware('auth')->name('checkoutMonthly');


Route::get('/profile', [UserController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

Route::post('/profile', [UserController::class, 'saveProfile'])
    ->middleware('auth')
    ->name('profile.save');


Route::get('/admin', [AdminController::class, 'admin'])
    ->middleware('auth')->middleware(VerifyUserIsAdmin::class)
    ->name('admin');

Route::get('/admin/users', [AdminController::class, 'adminUsers'])
    ->middleware('auth')->middleware(VerifyUserIsAdmin::class)
    ->name('admin.users');

Route::get('admin/users/create', [AdminController::class, 'adminNewUser'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);
Route::post('admin/users/create', [AdminController::class, 'adminCreateNewUser'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);


Route::get('/admin/users/{id}', [AdminController::class, 'adminCurrentUser'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);
Route::post('/admin/users/{id}', [AdminController::class, 'adminUpdateCurrentUser'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);
Route::get('/admin/users/{id}/delete', [AdminController::class, 'adminDeleteCurrentUser'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);


Route::get('/admin/actualites', [AdminController::class, 'adminActualites'])->middleware('auth')->middleware(VerifyUserIsAdmin::class)->name('admin.actualites');

Route::get('admin/actualites/create', [AdminController::class, 'adminNewActualite'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);
Route::post('admin/actualites/create', [AdminController::class, 'adminCreateNewActualite'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);

Route::get('/admin/actualites/{id}', [AdminController::class, 'adminCurrentActualite'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);
Route::post('/admin/actualites/{id}', [AdminController::class, 'adminUpdateCurrentActualite'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);
Route::get('/admin/actualites/{id}/delete', [AdminController::class, 'adminDeleteCurrentActualite'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);


Route::get('/admin/plans', [AdminController::class, 'adminPlans'])->middleware('auth')->name('admin.plans')->middleware(VerifyUserIsAdmin::class);
Route::get('/admin/plans/create', [AdminController::class, 'adminNewPlan'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);
Route::post('/admin/plans/create', [AdminController::class, 'adminCreateNewPlan'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);

Route::get('/admin/plans/{id}', [AdminController::class, 'adminCurrentPlan'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);
Route::post('/admin/plans/{id}', [AdminController::class, 'adminUpdateCurrentPlan'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);

Route::get('/admin/plans/{id}/delete', [AdminController::class, 'adminDeleteCurrentPlan'])->middleware('auth')->middleware(VerifyUserIsAdmin::class);


Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');


Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
