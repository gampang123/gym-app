<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\UserdasboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserclassController;
use App\Http\Controllers\PaymentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/home', [HomeController::class, 'index']);
route::get('/user', [UserdasboardController::class, 'index'])->name('user.pesanan');
route::get('/schedule', [UserdasboardController::class, 'schedule'])->name('user.schedule');
route::get('/dashboard', [DashboardController::class, 'index'])->name('user');
route::get('/member.dashboard', [MemberController::class, 'index']);
route::get('/admin.dataUser', [DatauserController::class, 'index'])->name('admin.dataUsers.index');
route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin.dataUsers/{id}/edit', [DatauserController::class, 'edit'])->name('admin.dataUsers.edit');
Route::put('/admin.dataUsers/{id}', [DatauserController::class, 'update'])->name('admin.dataUsers.update');

Route::middleware('auth')->group(function () {
    Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
});

Route::get('/', [UlasanController::class, 'index'])->name('dashboard');
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

Route::get('/admin.dataTrainer', [TrainerController::class, 'index'])->name('admin.dataTrainer.index');
Route::get('/admin.dataTrainer/create', [TrainerController::class, 'create'])->name('admin.dataTrainer.create');
Route::post('/admin.dataTrainer/create', [TrainerController::class, 'store'])->name('admin.dataTrainer.store');
Route::get('/admin/dataTrainer/{id}/edit', [TrainerController::class, 'edit'])->name('admin.dataTrainer.edit');
Route::post('/admin/dataTrainer/{id}/update', [TrainerController::class, 'update'])->name('admin.dataTrainer.update');
Route::get('/admin/dataTrainer/{id}/delete', [TrainerController::class, 'destroy'])->name('admin.dataTrainer.destroy');

Route::get('/admin/dataClass', [ClassController::class, 'index'])->name('admin.dataClass.index');
Route::get('/admin.dataClass/create', [ClassController::class, 'create'])->name('admin.dataClass.create');
Route::post('/admin.dataClass/create', [ClassController::class, 'store'])->name('admin.dataClass.store');
Route::get('/admin/dataClass/{id}/edit', [ClassController::class, 'edit'])->name('admin.dataClass.edit');
Route::post('/admin/dataClass/{id}/update', [ClassController::class, 'update'])->name('admin.dataClass.update');
Route::put('admin/dataClass/{id}/update', [ClassController::class, 'update'])->name('admin.dataClass.update');
Route::get('/admin/dataClass/{id}/delete', [ClassController::class, 'destroy'])->name('admin.dataClass.destroy');

Route::get('/admin/dataFitnes', [ProductController::class, 'index'])->name('admin.dataFitnes.index');
Route::get('/admin.dataFitnes/create', [ProductController::class, 'create'])->name('admin.dataFitnes.create');
Route::post('/admin.dataFitnes/create', [ProductController::class, 'store'])->name('admin.dataFitnes.store');
Route::get('/admin/dataFitnes/{id}/edit', [ProductController::class, 'edit'])->name('admin.dataFitnes.edit');
Route::post('/admin/dataFitnes/{id}/update', [ProductController::class, 'update'])->name('admin.dataFitnes.update');
Route::put('admin/dataFitnes/{id}/update', [ProductController::class, 'update'])->name('admin.dataFitnes.update');
Route::get('/admin/dataFitnes/{id}/delete', [ProductController::class, 'destroy'])->name('admin.dataFitnes.destroy');

Route::get('/admin/dataProgram', [ProgramController::class, 'index'])->name('admin.dataProgram.index');
Route::get('/admin.dataProgram/create', [ProgramController::class, 'create'])->name('admin.dataProgram.create');
Route::post('/admin.dataProgram/create', [ProgramController::class, 'store'])->name('admin.dataProgram.store');
Route::get('/admin/dataProgram/{id}/edit', [ProgramController::class, 'edit'])->name('admin.dataProgram.edit');
Route::post('/admin/dataProgram/{id}/update', [ProgramController::class, 'update'])->name('admin.dataProgram.update');
Route::put('admin/dataProgram/{id}/update', [ProgramController::class, 'update'])->name('admin.dataProgram.update');
Route::get('/admin/dataProgram/{id}/delete', [ProgramController::class, 'destroy'])->name('admin.dataProgram.destroy');

Route::get('user/{id}/add-photo-form', [DatauserController::class, 'addPhotoForm'])->name('user.addPhotoForm');
Route::post('user/{id}/add-photo', [DatauserController::class, 'addPhoto'])->name('user.addPhoto');
Route::post('user/{id}/delete-photo', [DatauserController::class, 'deletePhoto'])->name('user.deletePhoto');
Route::get('member/{id}/profile/edit', [DatauserController::class, 'editMemberProfile'])->name('member.profile.edit');
Route::get('admin/{id}/profile/edit', [DatauserController::class, 'editAdminProfile'])->name('admin.profile.edit');

Route::get('/admin/dataOrder', [OrderController::class, 'index'])->name('admin.dataOrder.index');
Route::get('/order', [OrderController::class, 'orderForm'])->name('order_form');
Route::post('/create-order', [OrderController::class, 'createOrder'])->name('create_order');
Route::get('/user/layouts/cart', [OrderController::class, 'viewCart'])->name('user.cart')->middleware('auth');
Route::post('/submit-order', [OrderController::class, 'submitOrder'])->name('submit_order')->middleware('auth');

Route::get('/admin/dataBooking', [BookingController::class, 'index'])->name('admin.dataBooking.index');
Route::get('/booking', [BookingController::class, 'bookingForm'])->name('booking_form');
Route::get('/user/layouts/booking', [BookingController::class, 'viewBooking'])->name('user.booking')->middleware('auth');
Route::post('submit-Booking', [BookingController::class, 'submitBooking'])->name('submit_booking')->middleware('auth');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Route::get('/pay/{orderId}', [PaymentController::class, 'pay'])->name('pay');
Route::get('/classtime_form', [PaymentController::class, 'pay'])->name('classtime_form');
Route::get('/user/layouts/history', [OrderController::class, 'viewHistory'])->name('user.history')->middleware('auth');

Route::get('/invoice/{id_order}', [OrderController::class, 'generateInvoice'])->name('generate.invoice'); 

Route::get('/booking/{id_booking}', [BookingController::class, 'generateInvoice'])->name('booking.generate.invoice');

// routes/web.php
// routes/web.php
Route::post('/payment/notification', [PaymentController::class, 'notificationHandler'])->name('payment.notification');
Route::get('/order/status/{orderId}', [PaymentController::class, 'getStatus'])->name('order.status');

require __DIR__.'/auth.php';
