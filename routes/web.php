<?php

use Illuminate\Support\Facades\Route;

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

//==SITE AREA==

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sobre-nos',[App\Http\Controllers\sobreController::class, 'index'])->name('sobre-nos');
Route::get('/servicos',[App\Http\Controllers\servicoController::class, 'index'])->name('servicos');
Route::get('/contate-nos',[App\Http\Controllers\contatoController::class, 'index'])->name('contato');
Route::get('/casas',[App\Http\Controllers\casaController::class, 'index'])->name('casas');
Route::get('/casa_show{id}', [App\Http\Controllers\casaController::class, 'show'])->name('casa.show');
Route::get('/casa_create', [App\Http\Controllers\casaController::class, 'create'])->name('site.casa.create')->middleware('redirect_login');
Route::get('/carros',[App\Http\Controllers\carroController::class, 'index'])->name('carros');
Route::get('/carro_show{id}', [App\Http\Controllers\carroController::class, 'show'])->name('carro.show');
Route::get('/alugar{id}', [App\Http\Controllers\aluguelController::class, 'create'])->name('aluguel.create');
Route::get('/perfil', [App\Http\Controllers\perfilController::class, 'index'])->name('user.perfil');
Route::get('/register-motorista', [App\Http\Controllers\MotoristaController::class, 'index2'])->name('site.register.motorista');
Route::get('/register-afiliado', [App\Http\Controllers\AfiliadosController::class, 'index2'])->name('site.register.afiliado');
Route::post('/comentar', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentar.store');
Route::post('/contatar', [App\Http\Controllers\contatoController::class, 'store'])->name('contatar.store');


//==FIM SITE AREA==

//==USER AREA==
//CHAT

Route::get('/chat_list', [App\Http\Controllers\ChatController::class, 'list'])->name('site.chat.list')->middleware('acesso_site');
Route::get('/chat_index{id}{id_casa}', [App\Http\Controllers\ChatController::class, 'index'])->name('site.chat.index')->middleware('acesso_site');
Route::get('/chat_index2{id}', [App\Http\Controllers\ChatController::class, 'list'])->name('site.chat2.index')->middleware('acesso_site');
Route::post('/chat{id}', [App\Http\Controllers\ChatController::class, 'store'])->name('site.chat.store')->middleware('acesso_site');

//CONVITE
Route::get('/convite{id}', [App\Http\Controllers\UserController::class, 'index3'])->name('convite.create');
Route::post('/convite_store{id}', [App\Http\Controllers\UserController::class, 'store2'])->name('convite.store');

//CRUD DOS MOTORISTAS
Route::get('/motorista-create', [App\Http\Controllers\UserController::class, 'motoristaCreate'])->name('motorista.create');
Route::post('/motorista_store', [App\Http\Controllers\UserController::class, 'motoristaStore'])->name('motorista.store');


 //CRUD CASAS
 Route::get('/casa', [App\Http\Controllers\casaController::class, 'index2'])->name('user.casa');
 Route::post('/casa_store', [App\Http\Controllers\casaController::class, 'store'])->name('user.casa.store');
 Route::post('/casa_update{id}', [App\Http\Controllers\casaController::class, 'update'])->name('user.casa.update');
 Route::get('/casa_delete{id}', [App\Http\Controllers\casaController::class, 'delete'])->name('user.casa.delete');
 Route::get('/casa_promover{id}', [App\Http\Controllers\casaController::class, 'promover'])->name('user.promover');

 //CRUD CARROS
 Route::get('/carro', [App\Http\Controllers\carroController::class, 'index2'])->name('user.carro');
 Route::post('/carro_store', [App\Http\Controllers\carroController::class, 'store'])->name('user.carro.store');
 Route::post('/carro_update{id}', [App\Http\Controllers\carroController::class, 'update'])->name('user.carro.update');
 Route::get('/carro_delete{id}', [App\Http\Controllers\carroController::class, 'delete'])->name('user.carro.delete');
 

 //CRUD ARRENDAMENTOS
 Route::get('/aluguel', [App\Http\Controllers\aluguelController::class, 'index2'])->name('user.aluguel');
 Route::post('/aluguel_store{id}', [App\Http\Controllers\aluguelController::class, 'store'])->name('user.aluguel.store');
 Route::post('/aluguel_update{id}', [App\Http\Controllers\aluguelController::class, 'update'])->name('user.aluguel.update');
 Route::get('/aluguel_delete{id}', [App\Http\Controllers\aluguelController::class, 'delete'])->name('user.aluguel.delete');


//CRUD Utilizador
Route::get('/user1', [App\Http\Controllers\UserController::class, 'index2'])->name('user.user.index');
Route::get('/user_edit1{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.user.edit');
Route::post('/user_store1', [App\Http\Controllers\UserController::class, 'store'])->name('user.user.store');
Route::post('/user_update1/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.user.update');
Route::get('/user_delete1/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.user.delete');

//Crud dos Pagamentos
Route::get('/pagemento_show{id}', [App\Http\Controllers\PagamentoController::class, 'show'])->name('user.pagemento.show1');
Route::get('/pagemento', [App\Http\Controllers\PagamentoController::class, 'index'])->name('user.pagemento.index');
Route::get('/pagemento_edit{id}', [App\Http\Controllers\PagamentoController::class, 'edit'])->name('user.pagemento.edit1');
Route::post('/pagemento_store', [App\Http\Controllers\PagamentoController::class, 'store'])->name('user.pagemento.store1');
Route::post('/pagemento_update/{id}', [App\Http\Controllers\PagamentoController::class, 'update'])->name('user.pagemento.update');
Route::get('/pagemento_delete/{id}', [App\Http\Controllers\PagamentoController::class, 'delete'])->name('user.pagemento.delete');

//== FIM USER AREA==


//==ADMIN AREA==

    Route::get('/admin_painel',[App\Http\Controllers\painelController::class, 'index'])->name('admin.painel')->middleware('acesso');


    //CRUD Utilizador
    Route::get('/admin_user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user')->middleware('acesso');
    Route::post('/admin_user_store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.user.store')->middleware('acesso');
    Route::post('/admin_user_update{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.user.update')->middleware('acesso');
    Route::get('/admin_user_delete{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('admin.user.delete')->middleware('acesso');

    //CRUD CASAS
    Route::get('/admin_casa', [App\Http\Controllers\casaController::class, 'index2'])->name('admin.casa')->middleware('acesso');
    Route::post('/admin_casa_store', [App\Http\Controllers\casaController::class, 'store'])->name('admin.casa.store')->middleware('acesso');
    Route::post('/admin_casa_update{id}', [App\Http\Controllers\casaController::class, 'update'])->name('admin.casa.update')->middleware('acesso');
    Route::get('/admin_casa_delete{id}', [App\Http\Controllers\casaController::class, 'delete'])->name('admin.casa.delete')->middleware('acesso');

    //CRUD CARROS
    Route::get('/admin_carro', [App\Http\Controllers\carroController::class, 'index2'])->name('admin.carro')->middleware('acesso');
    Route::post('/admin_carro_store', [App\Http\Controllers\carroController::class, 'store'])->name('admin.carro.store')->middleware('acesso');
    Route::post('/admin_carro_update{id}', [App\Http\Controllers\carroController::class, 'update'])->name('admin.carro.update')->middleware('acesso');
    Route::get('/admin_carro_delete{id}', [App\Http\Controllers\carroController::class, 'delete'])->name('admin.carro.delete')->middleware('acesso');
    
    //CRUD PROVÍNCIAS
    Route::get('/admin_provincia', [App\Http\Controllers\ProvinciaController::class, 'index'])->name('admin.provincia')->middleware('acesso');
    Route::post('/admin_provincia_store', [App\Http\Controllers\ProvinciaController::class, 'store'])->name('admin.provincia.store')->middleware('acesso');
    Route::post('/admin_provincia_update{id}', [App\Http\Controllers\ProvinciaController::class, 'update'])->name('admin.provincia.update')->middleware('acesso');
    Route::get('/admin_provincia_delete{id}', [App\Http\Controllers\ProvinciaController::class, 'delete'])->name('admin.provincia.delete')->middleware('acesso');

    //CRUD MUNICÍPIOS
    Route::get('/admin_municipio', [App\Http\Controllers\MunicipiosController::class, 'index'])->name('admin.municipio')->middleware('acesso');
    Route::post('/admin_municipio_store', [App\Http\Controllers\MunicipiosController::class, 'store'])->name('admin.municipio.store')->middleware('acesso');
    Route::post('/admin_municipio_update{id}', [App\Http\Controllers\MunicipiosController::class, 'update'])->name('admin.municipio.update')->middleware('acesso');
    Route::get('/admin_municipio_delete{id}', [App\Http\Controllers\MunicipiosController::class, 'delete'])->name('admin.municipio.delete')->middleware('acesso');

    //CRUD ALUGUÉIS
    Route::get('/admin_alugel', [App\Http\Controllers\aluguelController::class, 'index'])->name('admin.aluguel')->middleware('acesso');
    Route::post('/admin_alugel_store', [App\Http\Controllers\aluguelController::class, 'store'])->name('admin.aluguel.store')->middleware('acesso');
    Route::post('/admin_alugel_update{id}', [App\Http\Controllers\aluguelController::class, 'update'])->name('admin.aluguel.update')->middleware('acesso');
    Route::get('/admin_alugel_delete{id}', [App\Http\Controllers\aluguelController::class, 'delete'])->name('admin.aluguel.delete')->middleware('acesso');
  
    //CRUD CATEGORIAS
    Route::get('/admin_categoria', [App\Http\Controllers\CategoriaController::class, 'index'])->name('admin.categoria')->middleware('acesso');
    Route::post('/admin_categoria_store', [App\Http\Controllers\CategoriaController::class, 'store'])->name('admin.categoria.store')->middleware('acesso');
    Route::post('/admin_categoria_update{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('admin.categoria.update')->middleware('acesso');
    Route::get('/admin_categoria_delete{id}', [App\Http\Controllers\CategoriaController::class, 'delete'])->name('admin.categoria.delete')->middleware('acesso');

    //CRUD SUB_CATEGORIAS
    Route::get('/admin_sub_categoria', [App\Http\Controllers\SubCategoriaController::class, 'index'])->name('admin.sub_categoria')->middleware('acesso');
    Route::post('/admin_sub_categoria_store', [App\Http\Controllers\SubCategoriaController::class, 'store'])->name('admin.sub_categoria.store')->middleware('acesso');
    Route::post('/admin_sub_categoria_update{id}', [App\Http\Controllers\SubCategoriaController::class, 'update'])->name('admin.sub_categoria.update')->middleware('acesso');
    Route::get('/admin_sub_categoria_delete{id}', [App\Http\Controllers\SubCategoriaController::class, 'delete'])->name('admin.sub_categoria.delete')->middleware('acesso');

    //CRUD PAGAMENTOS AFILIADOS
    Route::get('/admin_afiliado', [App\Http\Controllers\AfiliadosController::class, 'index'])->name('admin.afiliado')->middleware('acesso');
    Route::post('/admin_afilado_store', [App\Http\Controllers\AfiliadosController::class, 'store'])->name('admin.afiliado.store')->middleware('acesso');
    Route::post('/admin_afilado_update{id}', [App\Http\Controllers\AfiliadosController::class, 'update'])->name('admin.afiliado.update')->middleware('acesso');
    Route::get('/admin_afilado_delete{id}', [App\Http\Controllers\AfiliadosController::class, 'delete'])->name('admin.afiliado.delete')->middleware('acesso');


    //CRUD PAGAENTOS MOTORISTAS
    Route::get('/admin_motorista', [App\Http\Controllers\MotoristaController::class, 'index'])->name('admin.motorista')->middleware('acesso');
    Route::post('/admin_motorista_store', [App\Http\Controllers\MotoristaController::class, 'store'])->name('admin.motorista.store')->middleware('acesso');
    Route::post('/admin_motorista_update{id}', [App\Http\Controllers\MotoristaController::class, 'update'])->name('admin.motorista.update')->middleware('acesso');
    Route::get('/admin_motorista_delete{id}', [App\Http\Controllers\MotoristaController::class, 'delete'])->name('admin.motorista.delete')->middleware('acesso');

    //LOGS
    Route::get('/admin_logs', [App\Http\Controllers\logsController::class, 'index'])->name('admin.logs')->middleware('acesso');;
    //SUPORTE
    Route::get('/suporte',[App\Http\Controllers\contatoController::class, 'index2'])->name('admin.suporte')->middleware('acesso');;
//==FIM ADMIN AREA==


//==AUTENTICATION AREA==

require __DIR__.'/auth.php';

//==FIM AUTENTICATION AREA==
