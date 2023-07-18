<?php


use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Classes\GetNotification;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Front\Checkouts;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/pagamento/{orderId}',  [Checkouts::class, 'payCard'])->name('card.pagamento');
Route::post('/notification', [GetNotification::class, 'index'])->name('notification');


Route::middleware(['api'])->group(function () {


    Route::post('/getOrders', [OrderController::class, 'getOrders']);
});
