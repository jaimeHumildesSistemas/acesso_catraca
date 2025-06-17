<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Services\CatracaService;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\TesteImageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\FormaPagamentoController;
use App\Http\Controllers\CaixaController;



// use Illuminate\Support\Facades\Route;
Route::get('/', [LoginController::class, 'login'])->name('login');

// Processar login
Route::post('login_validar', [LoginController::class, 'login_validar'])->name('login_validar');


// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');




// Rota para mostrar o QR code (exemplo: para o usuário autenticado com id 1)
Route::get('/qrcode', [QRCodeController::class, 'index'])->name('qrcode');
Route::get('/qrcode/gerar', [QRCodeController::class, 'gerar'])->name('qrcode.gerar');

Route::post('/acesso/validar', [AcessoController::class, 'validarQRCode'])->name('acesso.validar');
Route::get('/acesso/status/{status}', [AcessoController::class, 'status'])->name('acesso.status');

Route::get('/api/catraca/verificar/{uuid}', [AcessoController::class, 'verificar']);

Route::get('/teste-gd', [TesteImageController::class, 'testeGD']);



//Chamando a API
Route::get('/liberar-catraca', function () {
    $response = Http::get('http://localhost:5000/liberar');
    return $response->json();
});


Route::resource('filiais', FilialController::class);
Route::resource('produtos', App\Http\Controllers\ProdutoController::class);
Route::resource('formapagamento', FormaPagamentoController::class);


Route::middleware(['auth'])->group(function() {
    Route::get('/caixa', [CaixaController::class, 'index'])->name('caixa.index');
    Route::post('/caixa/gerar-qrcode', [CaixaController::class, 'gerarQr'])->name('qrcode.gerar');
});






