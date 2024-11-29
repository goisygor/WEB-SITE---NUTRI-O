<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ProdutosMiddleware;
use App\Http\Controllers\DashboardController;


// Rota para exibir a página inicial (welcome)
Route::get('/', function () {
    return view('welcome');
});

//no código abaixo a rota do tipo get vai ser para mostrar o formulário na tela
Route::get('/registro',[UserController::class, 'showRegistroForm'])->
name('usuarios.registro');

//no código abaixo a rota do tipo post vai ser para processar o formulário após preenchido, quando clicar no botão de enviar, ele vai enviar as informações para o banco de dados
Route::post('/registro',[UserController::class, 'registro'])->
name('usuarios.registro');


//no código abaixo a rota do tipo get vai ser para mostrar o login na tela
Route::get('/login',[UserController::class, 'showLoginForm'])->
name('usuarios.login');

//no código abaixo a rota do tipo post vai ser para processar o login após preenchido, quando clicar no botão de enviar, ele vai enviar as informações para o banco de dados
Route::post('/login',[UserController::class, 'login'])->
name('usuarios.login');

//criar uma rota para página interna onde ela só pode ser acessado se o usuário tiver feito o login
Route::get('/dashboard',[DashboardController::class,'index'])//criar esse código após a criação da dashboardcontroller
->middleware('auth')->name('dashboard');    //nessa linha faremos a autenticação(validação) para que apenas o usuário que efetuou o login possa acessar

//rota do botão logout
Route::post('/logout',[UserController::class,'logout']);

//rota para pagina de produtos e que nao permite acesso sem login do ADM
Route::resource('produtos', ProdutoController::class)->
middleware(ProdutosMiddleware::class)->except('show'); //autenticação de meio de curso, restringir uma pagina onde não é permitido que todos os usuários consigam acessar apenas se tiver permissão

Route::get('produtos/{produto}', [ProdutoController::class, 'show'])->middleware('auth')->name('produtos.show');


Route::get('/sobre-nos', function () {
    return view('pages.sobre-nos');
    });