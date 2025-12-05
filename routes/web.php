<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CarrinhoController;

Auth::routes(['register' => false]);

Route::get('/registro', [\App\Http\Controllers\Site\RegistroController::class, 'livewire'])->name('registro');

Route::namespace('User')->name('user.')->prefix('user')->middleware('auth')->group(function () {
    Route::get('/', 'MinhaContaController@show');

    Route::get('/minha-conta', 'MinhaContaController@edit')->name('minha-conta');
    Route::put('/minha-conta', 'MinhaContaController@update')->name('minha-conta.update');

    Route::resource('meus-enderecos', 'MeusEnderecosController')
        ->only('edit', 'destroy')
        ->middleware('usuario.endereco.owner');

    Route::resource('meus-enderecos', 'MeusEnderecosController')->only('index', 'create');
});

Route::group(['prefix' => 'gestor'], function () {
    Route::group(['middleware' => 'gestor.guest:gestor'], function () {
        Route::get('login', [App\Http\Controllers\Gestor\Auth\LoginController::class, 'showLoginForm'])->name('gestor.login');
        Route::post('login', [App\Http\Controllers\Gestor\Auth\LoginController::class, 'login'])->name('gestor.auth');
    });
    Route::group(['middleware' => 'gestor.auth'], function () {
        Route::post('logout', [App\Http\Controllers\Gestor\Auth\LoginController::class, 'logout'])->name('gestor.logout');
    });
});

Route::namespace('Site')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');


    Route::get('/categoria/{slug}/{id}', 'HomeController@categoria')->name('categoria');
    Route::get('/promocoes', 'HomeController@promocoes')->name('promocoes');

    Route::get('/paginas/{slug}/{id}', 'PaginasController@show')->name('paginas.show');
    Route::get('/produto/{slug}/{id}', 'ProdutosController@show')->name('produtos.show');

    Route::get('/carrinho', 'CarrinhoController@livewire')->name('carrinho');
    Route::get('/politica-privacidade', 'LgpdTermosController@show')->name('lgpd_termos');

//    Route::get('/produtos', 'ProdutosController@lista')->name('produtos');

    Route::get('/categoria/{slug}/{id}', [\App\Http\Controllers\Site\CategoriaController::class, 'show'])
        ->name('categoria');

    Route::get('/kits', [\App\Http\Controllers\Site\KitsController::class, 'index'])
        ->name('kits.index');
});

Route::namespace('Gestor')->name('gestor.')->prefix('gestor')->middleware('gestor.auth')->group(function () {
    Route::get('/', 'GestorController@index')->name('home');

    Route::resource('lgpd_termos', 'LgpdTermosController')->parameters(['lgpdTermos' => 'lgpdTermo'])->only('index');
    Route::get('/lgpd_termo/{id?}', 'LgpdTermosController@livewire')->name('lgpd_termo');
    Route::resource('lgpd_aceites', 'LgpdAceitesController')->parameters(['lgpdAceites' => 'lgpdAceite'])->only('index', 'show');

    Route::resource('configuracoes', 'ConfiguracoesController')
        ->only(['edit', 'update'])
        ->parameters(['configuracoes' => 'configuracao']);

    Route::resource('paginas', 'PaginasController')->parameters(['paginas' => 'pagina'])->only('index', 'destroy');
    Route::get('/pagina/{id?}', 'PaginasController@livewire')->name('pagina');

    Route::resource('usuarios', 'UsuariosController')->parameters(['usuarios' => 'user'])->only('index', 'destroy');
    Route::get('/usuario/{usuario?}', [\App\Http\Livewire\Gestor\Usuario\Usuario::class, '__invoke'])->name('usuario');

    Route::resource('gestores', 'GestoresController')->parameters(['gestores' => 'gestor'])->only('index', 'destroy');
    Route::get('/gestor/{id?}', 'GestoresController@livewire')->name('gestor');

    Route::resource('slides', 'SlidesController')->parameters(['slides' => 'slide'])->only('index', 'destroy');
    Route::get('/slide/{id?}', 'SlidesController@livewire')->name('slide');

    Route::namespace('Endereco')->name('endereco.')->prefix('endereco')->group(function () {
        Route::get('/dne', [\App\Http\Livewire\Gestor\Endereco\Dne::class, '__invoke'])->name('dne');

        Route::resource('enderecos_atendidos', 'EnderecosAtendidosController')->only('index', 'destroy');
        Route::get('/endereco_atendido/{enderecoAtendido?}', [\App\Http\Livewire\Gestor\Endereco\EnderecoAtendido::class, '__invoke'])->name('endereco_atendido');
    });

    Route::namespace('Produto')->name('produto.')->prefix('produto')->group(function () {
        Route::resource('produtos', 'ProdutosController')->only('index', 'destroy');
        Route::get('/produto/{produto?}', [\App\Http\Livewire\Gestor\Produto\Produto::class, '__invoke'])->name('produto');

        Route::get('/{produto}/grupos', [\App\Http\Controllers\Gestor\Produto\ProdutoGruposController::class, 'index'])->name('produto_grupos.index');
        Route::get('/grupos/remover/{grupo?}', [\App\Http\Controllers\Gestor\Produto\ProdutoGruposController::class, 'destroy'])->name('grupo.destroy');
        Route::get('/{produto}/grupos/cadastro/{grupo?}', [\App\Http\Livewire\Gestor\Produto\ProdutoGrupo::class, '__invoke'])->name('grupo');
    });

    Route::resource('produto_categorias', 'ProdutoCategoriasController')->parameters(['produto_categorias' => 'produto_categoria'])->only('index', 'destroy');
    Route::get('/produto_categoria/{id?}', 'ProdutoCategoriasController@livewire')->name('produto_categoria');

    Route::resource('forma_entregas', 'FormaEntregasController')
        ->parameters(['forma_entregas' => 'forma_entrega'])
        ->only('index', 'destroy');
    Route::get('/forma_entrega/{id?}', 'FormaEntregasController@livewire')->name('forma_entrega');

    Route::resource('forma_pagamentos', 'FormaPagamentosController')
        ->parameters(['forma_pagamentos' => 'forma_pagamento'])
        ->only('index', 'destroy');
    Route::get('/forma_pagamento/{id?}', 'FormaPagamentosController@livewire')->name('forma_pagamento');

    Route::resource('horarios', 'HorariosController')
        ->parameters(['horarios' => 'horario'])
        ->only('index', 'destroy');
    Route::get('/horario/{id?}', 'HorariosController@livewire')->name('horario');

    Route::resource('cupom_descontos', 'CupomDescontosController')->only('index', 'destroy');
    Route::get('/cupom_desconto/{cupomDesconto?}', [\App\Http\Livewire\Gestor\CupomDesconto::class, '__invoke'])->name('cupom_desconto');

    Route::get('/pedidos', 'PedidosController@index')->name('pedidos.index');

    Route::resource('topo_banners', 'TopoBannerController')->parameters(['topo_banners' => 'topoBanner']);
    Route::resource('depoimentos', 'DepoimentosController')->parameters(['depoimentos' => 'depoimento']);

    Route::namespace('Produto')->group(function () {
        Route::resource('produtos_destaque', 'ProdutosDestaqueController')
            ->parameters(['produtos_destaque' => 'destaque'])
            ->names('produtos_destaque');
    });


});

