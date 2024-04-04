<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/tickets', [TicketController::class, 'ticketList'])->name('tickets');
    Route::get('create-ticket', [TicketController::class, 'createTicket'])->name('create-ticket');
    Route::post('store-ticket', [TicketController::class, 'storeTicket'])->name('store-ticket');
    Route::get('/ticket-view/{id}', [TicketController::class, 'ticketView'])->name('ticket.view');

    Route::post('send-response', [TicketController::class, 'sendResponse'])->name('send-response');

});
