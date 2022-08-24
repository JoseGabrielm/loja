<?php

use App\Http\Livewire\Cores;
use App\Classes\CreatePayCard;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Front\About;
use App\Http\Livewire\Front\Carts;
use App\Http\Livewire\Front\Shops;
use App\Http\Livewire\Admin\Cities;
use App\Http\Livewire\Admin\Groups;
use App\Http\Livewire\Admin\Images;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\States;

use App\Http\Relatorios\PrintOrder;
use App\Http\Livewire\Admin\Clients;
use App\Http\Livewire\Admin\Jadlogs;
use App\Http\Livewire\Front\Details;
use App\Http\Livewire\Admin\Fretados;
use App\Http\Livewire\Admin\Payments;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Front\Contacts;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Addresses;
use App\Http\Livewire\Front\Checkouts;
use App\Http\Livewire\Front\Shoppings;
use App\Http\Livewire\Admin\Categories;
use App\Http\Livewire\Admin\OrderProducts;
use App\Http\Livewire\Front\Registrations;





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
});

Route::get('/redirect', function(){

    //verificar de onde esta vindo e para qual pagina sera redirecionado

    $route = url()->previous();
    if (str_contains($route, '/login')){

	return redirect('/');

    }elseif(str_contains($route, '/register')){

	return redirect('/');

    }elseif(str_contains($route, '/carrinho')){


	return redirect('/carrinho');

    session()->flash('message', 'login realizado com sucesso');


    }




});


Route::get('/contato', Contacts::class)->name('front.contact');
Route::get('/produto', Details::class)->name('front.detail');
Route::get('/', Shops::class)->name('front.shop');
Route::get('/carrinho', Carts::class)->name('front.cart');
Route::get('/sobre', About::class)->name('front.about');



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/confirmar', Checkouts::class)->name('front.checkout');
    Route::get('/pedido', Shoppings::class)->name('front.shopping');
    Route::get('/cadastro', Registrations::class)->name('front.registration');
});

Route::get('/cores', Cores::class)->name('cores');



Route::middleware('can:isAdmin')->group(function () {

    Route::get('/15afasf4545a1215qgvsa445181/categorias', Categories::class)->name('admin.categories');
    Route::get('/15afasf4545a1215qgvsa445181/produtos', Products::class)->name('admin.products');
    Route::get('/15afasf4545a1215qgvsa445181/grupos', Groups::class)->name('admin.groups');
    Route::get('/15afasf4545a1215qgvsa445181/frete', Fretados::class)->name('admin.fretados');
    Route::get('/15afasf4545a1215qgvsa445181/jadlog', Jadlogs::class)->name('admin.jadlogs');
    Route::get('/15afasf4545a1215qgvsa445181/imagens', Images::class)->name('admin.images');
    Route::get('/15afasf4545a1215qgvsa445181/usuarios', Users::class)->name('admin.users');
    Route::get('/15afasf4545a1215qgvsa445181/enderecos', Addresses::class)->name('admin.addresses');
    Route::get('/15afasf4545a1215qgvsa445181/estados', States::class)->name('admin.states');
    Route::get('/15afasf4545a1215qgvsa445181/cidades', Cities::class)->name('admin.cities');
    Route::get('/15afasf4545a1215qgvsa445181/detalhes', OrderProducts::class)->name('admin.details');

    // future adminpanel routes also should belong to the group
});

Route::middleware('can:isManager')->group(function () {
    Route::get('/15afasf4545a1215qgvsa445181/pagamento', Payments::class)->name('admin.payments');
    Route::get('/15afasf4545a1215qgvsa445181/clientes', Clients::class)->name('admin.clients');
    Route::get('/15afasf4545a1215qgvsa445181/pedidos', Orders::class)->name('admin.orders');
});





Route::get('/import-order', [PrintOrder::class, 'print'])->name('import');



//Route::get('/pagsegurocard/{code}', [PagseguroCard::class, 'show'])->name('pagsegurocard');
