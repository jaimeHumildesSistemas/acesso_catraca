<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Services\CatracaService;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\TesteImageController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Rota para mostrar o QR code (exemplo: para o usuário autenticado com id 1)
Route::get('/', [QRCodeController::class, 'index'])->name('qrcode.index');
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




