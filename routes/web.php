<?php

use Illuminate\Support\Facades\Route;

//Controller added
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegularPackageController;
use App\Http\Controllers\PremiumPackageController;
use App\Http\Controllers\ProPackageController;
use App\Http\Controllers\UltraproPackageController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocalGuideHostController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\VirtualAssistantController;

use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//For Guest visit
Route::get('/', [GuestController::class, 'homePage'])->name('/');
Route::get('/place/{id}', [GuestController::class, 'choosePlace'])->name('place');
Route::post('/contact/send-message', [GuestController::class, 'sendMessage'])->name('/contact/send-message');
Route::get('/place/{placeId}/package/{id}', [GuestController::class, 'selectedPackage'])->name('place/package');


//For registered user
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   
    Route::get('/user/log-out-other-browser-session', [HomeController::class, 'logOutOtherBrowser'])->name('/user/log-out-other-browser-session');
    Route::get('/dashboard', [HomeController::class, 'afterLogin'])->name('dashboard');
    Route::get('/history', [HomeController::class, 'viewHistory'])->name('/history');
    Route::get('/download/payment-copy/{id}', [HomeController::class, 'paymentCopyDownload'])->name('/download/payment-copy');
    Route::get('/tour/review/{id}', [HomeController::class, 'reviewPage'])->name('/tour/review');
    Route::post('/tour/review/submit/{id}', [HomeController::class, 'reviewSubmit'])->name('/tour/review/submit');
    Route::get('/return/booking/{id}', [HomeController::class, 'returnBooking'])->name('/return/booking');

});


//Regular Package
Route::get('/place/{placeId}/regular-package/{packageId}/guide-service/{id}', [RegularPackageController::class, 'afterSelectedGuide'])->name('place/package/guide-service');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/place/{placeId}/regular-package/{packageId}/guide-service/{guideServiceId}/bill-generate', [RegularPackageController::class, 'billGenerate'])->name('place/package/guide-service/bill-generate');
});


//Premium Package
Route::get('/place/{placeId}/premium-package/{packageId}/host-service/{id}', [PremiumPackageController::class, 'afterSelectedHost'])->name('place/package/host-service');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/place/{placeId}/premium-package/{packageId}/host-service/{hostServiceId}/bill-generate', [PremiumPackageController::class, 'billGenerate'])->name('place/package/host-service/bill-generate');
});


//Pro Package
Route::get('/place/{placeId}/pro-package/{packageId}/host-service/{id}', [ProPackageController::class, 'afterSelectedHost'])->name('place/package/host-service');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/place/{placeId}/pro-package/{packageId}/host-service/{hostServiceId}/bill-generate', [ProPackageController::class, 'billGenerate'])->name('place/package/host-service/bill-generate');
});


//Ultarpro Package
Route::get('/place/{placeId}/ultrapro-package/{packageId}/guide-service/{id}', [UltraproPackageController::class, 'afterSelectedGuide'])->name('place/package/guide-service');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/place/{placeId}/ultrapro-package/{packageId}/guide-service/{guideServiceId}/bill-generate', [UltraproPackageController::class, 'billGenerate'])->name('place/package/guide-service/bill-generate');
});


// SSLCOMMERZ Start
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

   
});


//Local guide & host
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/add/service', [LocalGuideHostController::class, 'addService'])->name('/add/service');
    Route::post('/add/service/process', [LocalGuideHostController::class, 'addServiceProcess'])->name('/add/service/process');
    Route::get('/all/service', [LocalGuideHostController::class, 'allService'])->name('/all/service');
    Route::get('/service/view/{id}', [LocalGuideHostController::class, 'viewService'])->name('/service/view');
    Route::get('/service/edit/{id}', [LocalGuideHostController::class, 'editService'])->name('/service/edit');
    Route::post('/service/update/{id}', [LocalGuideHostController::class, 'updateServiceProcess'])->name('/service/update');
    Route::get('/balance/statement', [LocalGuideHostController::class, 'balanceStatement'])->name('/balance/statement');
    Route::get('/review/list', [LocalGuideHostController::class, 'reviewList'])->name('/review/list');
    Route::get('/pending/tours', [LocalGuideHostController::class, 'pendingTour'])->name('/pending/tours');
    Route::get('/pendingTour/send/completed-request/{id}', [LocalGuideHostController::class, 'receiveTourCompletedRequest'])->name('/pendingTour/send/completed-request');
    Route::get('/canceled/tours', [LocalGuideHostController::class, 'canceledTour'])->name('/canceled/tours');
    Route::get('/completed/tours', [LocalGuideHostController::class, 'completedTour'])->name('/completed/tours');
    Route::get('/pendingTour/details/{id}', [LocalGuideHostController::class, 'pendingTourDetails'])->name('/pendingTour/details');
    Route::get('/canceledTour/details/{id}', [LocalGuideHostController::class, 'canceledTourDetails'])->name('/canceledTour/details');
    Route::get('/completedTour/details/{id}', [LocalGuideHostController::class, 'completedTourDetails'])->name('/completdTour/details');


});


//Super admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/place-list', [SuperAdminController::class, 'placeList'])->name('/place-list');
    Route::get('/add/place', [SuperAdminController::class, 'addPlace'])->name('/add/place');
    Route::get('/place/edit/{id}', [SuperAdminController::class, 'placeEdit'])->name('/place/edit');
    Route::post('/place/update/{id}', [SuperAdminController::class, 'placeUpdate'])->name('/place/update');
    Route::get('/pending/guide-host', [SuperAdminController::class, 'pendingGuideHost'])->name('/pending/guide-host');
    Route::get('/pending/guide-host/approve/{id}', [SuperAdminController::class, 'approveGuideHost'])->name('/pending/guide-host/approve');
    Route::get('/pending-guide-host/details/{id}', [SuperAdminController::class, 'pendingGuideHostDetails'])->name('/pending-guide-host/details');
    Route::post('/add/place/process', [SuperAdminController::class, 'addPlaceProcess'])->name('/add/place/process');
    Route::get('/local-guide-list', [SuperAdminController::class, 'guideList'])->name('/local-guide/list');
    Route::get('/local-guide/list/{id}', [SuperAdminController::class, 'guideDetails'])->name('/local-guide/list/{id}');
    Route::get('/local-host-list', [SuperAdminController::class, 'hostList'])->name('/local-host/list');
    Route::get('/local-host/list/{id}', [SuperAdminController::class, 'hostDetails'])->name('/local-host/list/{id}');
    Route::get('/tourist-list', [SuperAdminController::class, 'touristList'])->name('/tourist/list');
    Route::get('/tourist-list/{id}', [SuperAdminController::class, 'touristDetails'])->name('/tourist/list');
    Route::get('/virtual-assistant-list', [SuperAdminController::class, 'virtualAssistantList'])->name('/virtual-assistant/list');
    Route::get('/virtual-assistant/list/{id}', [SuperAdminController::class, 'virtualAssistantDetails'])->name('/virtual-assistant/list/{id}');
    Route::get('/virtual-assistant/edit/{id}', [SuperAdminController::class, 'virtualAssistantEdit'])->name('/virtual-assistant/edit/{id}');
    Route::post('/virtual-assistant/update/{id}', [SuperAdminController::class, 'virtualAssistantUpdate'])->name('/virtual-assistant/update/{id}');
    Route::get('/add/super-admin', [SuperAdminController::class, 'addSuperAdmin'])->name('/add/super-admin');
    Route::post('/add/super-admin/process', [SuperAdminController::class, 'addSuperAdminProcess'])->name('/add/super-admin/process');
    Route::get('/super-admin-list', [SuperAdminController::class, 'superAdminList'])->name('/super-admin/list');
    Route::get('/super-admin-list/{id}', [SuperAdminController::class, 'superAdminDetails'])->name('/super-admin/list');
    Route::get('/booking-list', [SuperAdminController::class, 'bookingList'])->name('/booking-list');
    Route::get('/booking-list/details/{id}', [SuperAdminController::class, 'bookingListDetails'])->name('/booking-list/details');
    Route::get('/pay/guide-host/{id}', [SuperAdminController::class, 'billGuideHost'])->name('/pay/guide-host');
    Route::post('/paid/guide-host/{id}', [SuperAdminController::class, 'paidGuideHost'])->name('/paid/guide-host');
    Route::get('/booking/list/return', [SuperAdminController::class, 'returnBookingList'])->name('/booking/list/return');
    Route::get('/return-booking-list/details/{id}', [SuperAdminController::class, 'returnBookingListDetails'])->name('/return-booking-list/details');
    Route::get('/return/booking/process/{id}', [SuperAdminController::class, 'returnBookingProcess'])->name('/return/booking/process');
    Route::post('/return/booking/confirm/{id}', [SuperAdminController::class, 'returnBookingConfirm'])->name('/return/booking/confirm');
    Route::get('/messages', [SuperAdminController::class, 'messageList'])->name('/messages');
    Route::get('/add/banner', [SuperAdminController::class, 'addBanner'])->name('/add/banner');
    Route::post('/add/banner/process', [SuperAdminController::class, 'addBannerProcess'])->name('/add/banner/process');
    Route::get('/all/banner', [SuperAdminController::class, 'bannerList'])->name('/all/banner');
    Route::get('/banner/delete/{id}', [SuperAdminController::class, 'bannerDelete'])->name('/banner/delete');

});

//virtual assistant service
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    Route::get('/virtual-assistant/service/{id}', [VirtualAssistantController::class, 'virtualAssistantService'])->name('/virtual-assistant/service');

});