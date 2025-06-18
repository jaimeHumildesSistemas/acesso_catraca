<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\TesteImageController;
use App\Http\Controllers\FilialController;
<<<<<<< HEAD
=======
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FormaPagamentoController;
>>>>>>> 7785d95 (Reenviando todos os arquivos para o repositório)

// ROTA DE LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('login_validar', [LoginController::class, 'login_validar'])->name('login_validar');

// ROTA INICIAL -> REDIRECIONAR PARA LOGIN
Route::redirect('/', '/login');

// LOGOUT
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// ROTAS PROTEGIDAS POR LOGIN
Route::middleware(['auth'])->group(function () {
    
    // Página inicial pós login
    Route::get('/qrcode', [QRCodeController::class, 'index'])->name('qrcode');
    Route::get('/qrcode/gerar', [QRCodeController::class, 'gerar'])->name('qrcode.gerar');

    // Validação de acesso por QR Code
    Route::post('/acesso/validar', [AcessoController::class, 'validarQRCode'])->name('acesso.validar');
    Route::get('/acesso/status/{status}', [AcessoController::class, 'status'])->name('acesso.status');

    // API local da catraca
    Route::get('/api/catraca/verificar/{uuid}', [AcessoController::class, 'verificar']);

    // Teste de GD
    Route::get('/teste-gd', [TesteImageController::class, 'testeGD']);

    // Chamando API da catraca externa
    Route::get('/liberar-catraca', function () {
        $response = Http::get('http://localhost:5000/liberar');
        return $response->json();
    });

    // Cadastros
    Route::resource('filiais', FilialController::class);
    Route::resource('produtos', ProdutoController::class);

    Route::get('/formapagamento', [FormaPagamentoController::class, 'index'])->name('formapagamento.index');

});
<<<<<<< HEAD
<<<<<<< HEAD


Route::resource('filiais', FilialController::class);
Route::resource('produtos', App\Http\Controllers\ProdutoController::class);
Route::resource('formapagamento', FormaPagamentoController::class);


Route::middleware(['auth'])->group(function() {
    Route::get('/caixa', [CaixaController::class, 'index'])->name('caixa.index');
    Route::post('/caixa/gerar-qrcode', [CaixaController::class, 'gerarQr'])->name('qrcode.gerar');
});






=======
>>>>>>> e55517d (modal)
=======
>>>>>>> 7785d95 (Reenviando todos os arquivos para o repositório)
