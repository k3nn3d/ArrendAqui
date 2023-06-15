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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('controle');
Route::get('/voltar',[App\Http\Controllers\HomeController::class, 'voltar'])->name('back')->middleware('controle');
Route::get('/sobre-nos',[App\Http\Controllers\sobreController::class, 'index'])->name('sobre-nos')->middleware('controle');
Route::get('/servicos',[App\Http\Controllers\servicoController::class, 'index'])->name('servicos')->middleware('controle');
Route::get('/contate-nos',[App\Http\Controllers\contatoController::class, 'index'])->name('contato')->middleware('controle');
Route::get('/imoveis',[App\Http\Controllers\casaController::class, 'index'])->name('casas')->middleware('controle');
Route::get('/imovel/show{id}', [App\Http\Controllers\casaController::class, 'show'])->name('casa.show')->middleware('controle');
Route::get('/imovel/create', [App\Http\Controllers\casaController::class, 'create'])->name('site.casa.create')->middleware('controle')->middleware('redirect_login');
Route::get('/carros',[App\Http\Controllers\carroController::class, 'index'])->name('carros')->middleware('controle');
Route::get('/carro/show{id}', [App\Http\Controllers\carroController::class, 'show'])->name('carro.show')->middleware('controle');
Route::get('/alugar{id}', [App\Http\Controllers\aluguelController::class, 'create'])->name('aluguel.create')->middleware('controle');
Route::get('/register/motorista', [App\Http\Controllers\MotoristaController::class, 'index2'])->name('site.register.motorista')->middleware('controle');
Route::get('/register/afiliado', [App\Http\Controllers\AfiliadosController::class, 'index2'])->name('site.register.afiliado')->middleware('controle');
Route::post('/comentar', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentar.store')->middleware('controle');
Route::post('/contatar', [App\Http\Controllers\contatoController::class, 'store'])->name('contatar.store')->middleware('controle');


//==FIM SITE AREA==

//==USER AREA==
//==PERFIL==
Route::get('/user/dashboard', [App\Http\Controllers\perfilController::class, 'index'])->name('user.dashboard')->middleware('controle');
//CRUD Utilizador
Route::get('/user1', [App\Http\Controllers\UserController::class, 'index2'])->name('user.user.index')->middleware('controle')->middleware('acesso_site');
Route::get('/user/perfil{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.user.perfil')->middleware('controle')->middleware('acesso_site');
Route::post('/user/store1', [App\Http\Controllers\UserController::class, 'store'])->name('user.user.store')->middleware('controle')->middleware('acesso_site');
Route::post('/user/update1/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.user.update')->middleware('controle')->middleware('acesso_site');
Route::get('/user/delete1/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.user.delete')->middleware('controle')->middleware('acesso_site');

//CHAT

Route::get('/chat/list', [App\Http\Controllers\ChatController::class, 'list'])->name('site.chat.list')->middleware('controle')->middleware('acesso_site');
Route::get('/chat/actualizar{id}{id_casa}', [App\Http\Controllers\ChatController::class, 'actualizar'])->middleware('controle')->name('site.chat.actualizar')->middleware('acesso_site');

Route::get('/chat/index{id}{id_casa}', [App\Http\Controllers\ChatController::class, 'index'])->name('site.chat.index')->middleware('controle')->middleware('redirect_login');
Route::get('/chat/index2{id}', [App\Http\Controllers\ChatController::class, 'list'])->name('site.chat2.index')->middleware('controle')->middleware('acesso_site');
Route::post('/chat{id}{id_casa}', [App\Http\Controllers\ChatController::class, 'store'])->name('site.chat.store')->middleware('controle')->middleware('acesso_site');

//CONVITE
Route::get('/convidados', [App\Http\Controllers\perfilController::class, 'convidados'])->name('user.convidado')->middleware('controle')->middleware('redirect_login');
//Route::get('/convite{id}', [App\Http\Controllers\UserController::class, 'index3'])->name('convite.create');
//Route::post('/convite_store{id}', [App\Http\Controllers\UserController::class, 'store2'])->name('convite.store');

//CRUD DOS MOTORISTAS
Route::get('/motorista/create', [App\Http\Controllers\UserController::class, 'motoristaCreate'])->name('motorista.create')->middleware('controle');
Route::post('/motorista/store', [App\Http\Controllers\UserController::class, 'motoristaStore'])->name('motorista.store')->middleware('controle');


 //CRUD CASAS
 Route::get('/imovel', [App\Http\Controllers\perfilController::class, 'casas'])->name('user.casa')->middleware('controle')->middleware('redirect_login');
 Route::post('/imovel/store', [App\Http\Controllers\casaController::class, 'store'])->name('user.casa.store')->middleware('controle')->middleware('redirect_login');
 Route::post('/imovel/update{id}', [App\Http\Controllers\casaController::class, 'update'])->name('user.casa.update')->middleware('controle')->middleware('redirect_login');
 Route::get('/imovel/delete{id}', [App\Http\Controllers\casaController::class, 'delete'])->name('user.casa.delete')->middleware('controle')->middleware('redirect_login');
 Route::get('/imovel/promover{id}', [App\Http\Controllers\casaController::class, 'promover'])->name('user.promover')->middleware('controle')->middleware('redirect_login');
 Route::get('/municipios/{provincia}', function($provincia) {
    $municipios = DB::table('municipios')
                    ->where('id_provincia', $provincia)
                    ->get();
    return response()->json($municipios);
})->name('municipio_consultar');
 //CRUD CARROS
 Route::get('/carro', [App\Http\Controllers\carroController::class, 'index_user'])->name('user.carro')->middleware('controle')->middleware('redirect_login');
 Route::get('/carro/create', [App\Http\Controllers\carroController::class, 'create'])->name('site.carro.create')->middleware('controle')->middleware('redirect_login');
 Route::post('/carro/store', [App\Http\Controllers\carroController::class, 'store'])->name('user.carro.store')->middleware('controle')->middleware('redirect_login');
 Route::post('/carro/update{id}', [App\Http\Controllers\carroController::class, 'update'])->name('user.carro.update')->middleware('controle')->middleware('redirect_login');
 Route::get('/carro/delete{id}', [App\Http\Controllers\carroController::class, 'delete'])->name('user.carro.delete')->middleware('controle')->middleware('redirect_login');
 

 //CRUD ARRENDAMENTOS 
 Route::get('/reservas/carros', [App\Http\Controllers\perfilController::class, 'arrendamentos'])->name('user.reserva')->middleware('controle')->middleware('redirect_login');
 Route::get('/arrendamentos', [App\Http\Controllers\perfilController::class, 'arrendamentos'])->name('user.aluguel')->middleware('controle')->middleware('redirect_login');
 Route::any('/arrendamento/store{id}', [App\Http\Controllers\aluguelController::class, 'store'])->name('user.aluguel.store')->middleware('controle')->middleware('redirect_login');
 Route::any('/arrendamento/update{id}', [App\Http\Controllers\aluguelController::class, 'update'])->name('user.aluguel.update')->middleware('controle')->middleware('redirect_login');
 Route::get('/arrendamento/delete{id}', [App\Http\Controllers\aluguelController::class, 'delete'])->name('user.aluguel.delete')->middleware('controle')->middleware('redirect_login');
 Route::get('/arrendamento/recusar{id}', [App\Http\Controllers\aluguelController::class, 'recusar'])->name('user.aluguel.recusar')->middleware('controle')->middleware('redirect_login');
 //PEDIDO
 Route::get('/pedidos', [App\Http\Controllers\pedidoController::class, 'pedido'])->name('user.pedido')->middleware('controle')->middleware('redirect_login');
 Route::get('/pedidos/ver{pedido:id}', [App\Http\Controllers\pedidoController::class, 'pedido_ver'])->name('user.pedido.ver')->middleware('controle')->middleware('redirect_login');
 Route::get('/pedidos/aceitar{pedido:id}', [App\Http\Controllers\pedidoController::class, 'pedido_aceitar'])->name('user.pedido.aceitar')->middleware('controle')->middleware('redirect_login');
 Route::get('/pedidos/recusar{pedido:id}', [App\Http\Controllers\pedidoController::class, 'recusar'])->name('user.pedido.recusar')->middleware('controle')->middleware('redirect_login');

 Route::post('/pedidos/store', [App\Http\Controllers\pedidoController::class, 'store'])->name('user.pedido.store')->middleware('controle')->middleware('redirect_login');
 Route::get('/pedidos/delete', [App\Http\Controllers\pedidoController::class, 'delete'])->name('user.pedido.delete')->middleware('controle')->middleware('redirect_login');


 //RESERVAS
 Route::get('/reservar/carro{id_casa}', [App\Http\Controllers\aluguelController::class, 'reservar_carro'])->name('user.reservar.carro')->middleware('controle')->middleware('redirect_login');
 Route::get('/cancelar/reservar/carro{id}', [App\Http\Controllers\aluguelController::class, 'n_reservar_carro'])->name('user.n_reservar.carro')->middleware('controle')->middleware('redirect_login');

//Crud dos Pagamentos
Route::get('/pagemento/show{id}', [App\Http\Controllers\PagamentoController::class, 'show'])->name('user.pagemento.show1')->middleware('controle')->middleware('redirect_login');
Route::get('/pagemento', [App\Http\Controllers\PagamentoController::class, 'index'])->name('user.pagemento.index')->middleware('controle')->middleware('redirect_login');
Route::get('/pagemento/edit{id}', [App\Http\Controllers\PagamentoController::class, 'edit'])->name('user.pagemento.edit1')->middleware('controle')->middleware('redirect_login');
Route::post('/pagemento/store', [App\Http\Controllers\PagamentoController::class, 'store'])->name('user.pagemento.store1')->middleware('controle')->middleware('redirect_login');
Route::post('/pagemento/update/{id}', [App\Http\Controllers\PagamentoController::class, 'update'])->name('user.pagemento.update')->middleware('controle')->middleware('redirect_login');
Route::get('/pagemento/delete/{id}', [App\Http\Controllers\PagamentoController::class, 'delete'])->name('user.pagemento.delete')->middleware('controle')->middleware('redirect_login');
Route::get('/pagemento/peddo/{pedido:id}', [App\Http\Controllers\PagamentoController::class, 'pagar_pedido'])->name('user.pagemento.pedido')->middleware('controle')->middleware('redirect_login');
Route::get('/pagar/pedido/{pedido:id}', [App\Http\Controllers\PagamentoController::class, 'pagar_pedido_p'])->name('user.pagar.pedido')->middleware('controle')->middleware('redirect_login');
//== FIM USER AREA==


//==ADMIN AREA==

    Route::get('/admin/painel',[App\Http\Controllers\painelController::class, 'index'])->name('admin.painel')->middleware('controle')->middleware('acesso');


    //CRUD Utilizador
    Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user')->middleware('controle')->middleware('acesso');
    Route::post('/admin/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.user.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/user/update{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.user.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/user/delete{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('admin.user.delete')->middleware('controle')->middleware('acesso');
    
    Route::get('/url', [App\Http\Controllers\UserController::class, 'app_url'])->name('url');
    //CRUD CASAS
    Route::get('/admin/imovel', [App\Http\Controllers\casaController::class, 'index2'])->name('admin.casa')->middleware('controle')->middleware('acesso');
    Route::post('/admin/imvel/store', [App\Http\Controllers\casaController::class, 'store'])->name('admin.casa.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/imovel/update{id}', [App\Http\Controllers\casaController::class, 'update'])->name('admin.casa.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/imovel/delete{id}', [App\Http\Controllers\casaController::class, 'delete'])->name('admin.casa.delete')->middleware('controle')->middleware('acesso');
    Route::get('/admin/imovel/analisar{id}', [App\Http\Controllers\casaController::class, 'analisar'])->name('admin.casa.analisar')->middleware('controle')->middleware('acesso');
    Route::post('/admin/imovel/analisar/confirm{id}', [App\Http\Controllers\casaController::class, 'analisar_confirm'])->name('admin.casa.analisar_confirm')->middleware('controle')->middleware('acesso');

    //CRUD CARROS
    Route::get('/admin/carro', [App\Http\Controllers\carroController::class, 'index2'])->name('admin.carro')->middleware('controle')->middleware('acesso');
    Route::post('/admin/carro/store', [App\Http\Controllers\carroController::class, 'store'])->name('admin.carro.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/carro/update{id}', [App\Http\Controllers\carroController::class, 'update'])->name('admin.carro.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/carro/delete{id}', [App\Http\Controllers\carroController::class, 'delete'])->name('admin.carro.delete')->middleware('controle')->middleware('acesso');
    
    //CRUD PROVÍNCIAS
    Route::get('/admin/provincia', [App\Http\Controllers\ProvinciaController::class, 'index'])->name('admin.provincia')->middleware('controle')->middleware('acesso');
    Route::post('/admin/provincia/store', [App\Http\Controllers\ProvinciaController::class, 'store'])->name('admin.provincia.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/provincia/update{id}', [App\Http\Controllers\ProvinciaController::class, 'update'])->name('admin.provincia.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/provincia/delete{id}', [App\Http\Controllers\ProvinciaController::class, 'delete'])->name('admin.provincia.delete')->middleware('controle')->middleware('acesso');

    //CRUD MUNICÍPIOS
    Route::get('/admin/municipio', [App\Http\Controllers\MunicipiosController::class, 'index'])->name('admin.municipio')->middleware('controle')->middleware('acesso');
    Route::post('/admin/municipio/store', [App\Http\Controllers\MunicipiosController::class, 'store'])->name('admin.municipio.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/municipio/update{id}', [App\Http\Controllers\MunicipiosController::class, 'update'])->name('admin.municipio.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/municipio/delete{id}', [App\Http\Controllers\MunicipiosController::class, 'delete'])->name('admin.municipio.delete')->middleware('controle')->middleware('acesso');

    //CRUD ALUGUÉIS
    Route::get('/admin/alugel', [App\Http\Controllers\aluguelController::class, 'index'])->name('admin.aluguel')->middleware('controle')->middleware('acesso');
    Route::post('/admin/alugel/store', [App\Http\Controllers\aluguelController::class, 'store'])->name('admin.aluguel.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/alugel/update{id}', [App\Http\Controllers\aluguelController::class, 'update'])->name('admin.aluguel.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/alugel/delete{id}', [App\Http\Controllers\aluguelController::class, 'delete'])->name('admin.aluguel.delete')->middleware('controle')->middleware('acesso');
  
    //CRUD CATEGORIAS
    Route::get('/admin/categoria', [App\Http\Controllers\CategoriaController::class, 'index'])->name('admin.categoria')->middleware('controle')->middleware('acesso');
    Route::post('/admin/categoria/store', [App\Http\Controllers\CategoriaController::class, 'store'])->name('admin.categoria.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/categoria/update{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('admin.categoria.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/categoria/delete{id}', [App\Http\Controllers\CategoriaController::class, 'delete'])->name('admin.categoria.delete')->middleware('controle')->middleware('acesso');

    //CRUD SUB_CATEGORIAS
    Route::get('/admin/sub/categoria', [App\Http\Controllers\SubCategoriaController::class, 'index'])->name('admin.sub_categoria')->middleware('controle')->middleware('acesso');
    Route::post('/admin/sub/categoria/store', [App\Http\Controllers\SubCategoriaController::class, 'store'])->name('admin.sub_categoria.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/sub/categoria/update{id}', [App\Http\Controllers\SubCategoriaController::class, 'update'])->name('admin.sub_categoria.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/sub/categoria/delete{id}', [App\Http\Controllers\SubCategoriaController::class, 'delete'])->name('admin.sub_categoria.delete')->middleware('controle')->middleware('acesso');

    //CRUD PAGAMENTOS AFILIADOS
    Route::get('/admin/afiliado', [App\Http\Controllers\AfiliadosController::class, 'index'])->name('admin.afiliado')->middleware('controle')->middleware('acesso');
    Route::get('/admin/afiliado/preco', [App\Http\Controllers\AfiliadosController::class, 'preco'])->name('admin.afiliado.preco')->middleware('controle')->middleware('acesso');
    Route::post('/admin/afiliado/store', [App\Http\Controllers\AfiliadosController::class, 'store'])->name('admin.afiliado.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/afiliado/pagar{id}', [App\Http\Controllers\PagamentoController::class, 'pagar_afiliado'])->name('admin.afiliado.pagar')->middleware('controle')->middleware('acesso');
    Route::post('/admin/afiliado/update{id}', [App\Http\Controllers\AfiliadosController::class, 'update'])->name('admin.afiliado.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/afiliado/delete{id}', [App\Http\Controllers\AfiliadosController::class, 'delete'])->name('admin.afiliado.delete')->middleware('controle')->middleware('acesso');

    //GERAR PDF|RELATÓRIO
    Route::get('/arrendaqui/relatorio/user', [App\Http\Controllers\RelatorioController::class, 'relatorio_user'])->name('user.pdf')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorio', [App\Http\Controllers\RelatorioController::class, 'gerar_relatorio_geral'])->name('pdf')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorio/imoveis', [App\Http\Controllers\RelatorioController::class, 'relatorio_casas'])->name('casas.pdf')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorio/carros', [App\Http\Controllers\RelatorioController::class, 'relatorio_carros'])->name('carros.pdf')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorio/imoveis/mais', [App\Http\Controllers\RelatorioController::class, 'relatorio_casas_mais'])->name('casas.mais.pdf')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorio/reservas', [App\Http\Controllers\RelatorioController::class, 'relatorio_reservas'])->name('reservas.pdf')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorio/reservas/carros', [App\Http\Controllers\RelatorioController::class, 'relatorio_reservas_carros'])->name('reservas.carros.pdf')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorio/log', [App\Http\Controllers\RelatorioController::class, 'relatorio_logs'])->name('logs.pdf')->middleware('controle')->middleware('acesso');
    
    //RELATÓRIO VIEWS
    
    Route::get('/arrendaqui/relatorios/user', [App\Http\Controllers\RelatorioController::class, '_user'])->name('user.relatorio')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorios/imoveis', [App\Http\Controllers\RelatorioController::class, '_casas'])->name('casas.relatorio')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorios/carros', [App\Http\Controllers\RelatorioController::class, '_carros'])->name('carros.relatorio')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorios/imoveis/mais', [App\Http\Controllers\RelatorioController::class, '_casas_mais'])->name('casas.mais.relatorio')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorios/reservas', [App\Http\Controllers\RelatorioController::class, '_reservas'])->name('reservas.relatorio')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorios/reservas/carros', [App\Http\Controllers\RelatorioController::class, '_reservas_carros'])->name('reservas.carros.relatorio')->middleware('controle')->middleware('acesso');
    Route::get('/arrendaqui/relatorios/logs', [App\Http\Controllers\RelatorioController::class, '_logs'])->name('logs.relatorio')->middleware('controle')->middleware('acesso');
   

    //CRUD PAGAENTOS MOTORISTAS
    Route::get('/admin/motorista', [App\Http\Controllers\MotoristaController::class, 'index'])->name('admin.motorista')->middleware('controle')->middleware('acesso');
    Route::get('/admin/motorista/preco', [App\Http\Controllers\MotoristaController::class, 'preco'])->name('admin.motorista.preco')->middleware('controle')->middleware('acesso');
    Route::post('/admin/motorista/store', [App\Http\Controllers\MotoristaController::class, 'store'])->name('admin.motorista.store')->middleware('controle')->middleware('acesso');
    Route::post('/admin/motorista/update{id}', [App\Http\Controllers\MotoristaController::class, 'update'])->name('admin.motorista.update')->middleware('controle')->middleware('acesso');
    Route::get('/admin/motorista/delete{id}', [App\Http\Controllers\MotoristaController::class, 'delete'])->name('admin.motorista.delete')->middleware('controle')->middleware('acesso');

    //LOGS
    Route::get('/admin/logs', [App\Http\Controllers\logsController::class, 'index'])->name('admin.logs')->middleware('controle')->middleware('acesso');
    //SUPORTE
    Route::get('/admin/suporte',[App\Http\Controllers\contatoController::class, 'index2'])->name('admin.suporte')->middleware('controle')->middleware('acesso');
    //COMENTÁRIOS
    Route::get('/admin/comentario',[App\Http\Controllers\contatoController::class, 'index3'])->name('admin.comentario')->middleware('controle')->middleware('acesso');
    Route::get('/admin/comentario/delete{id}',[App\Http\Controllers\contatoController::class, 'delete_comment'])->name('admin.comentario.delete')->middleware('controle')->middleware('acesso');
   
    //==FIM ADMIN AREA==


//==AUTENTICATION AREA==

require __DIR__.'/auth.php';

//==FIM AUTENTICATION AREA==

