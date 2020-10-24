<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefasController;


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

Route::get('/', HomeController::class);
Route::view('/ola', 'teste');
Route::resource('todo', 'TodoController');
/*
GET    - /todo           - index   - todo.index   - Lista os itens
GET    - /todo/create    - create  - todo.create  - Form de criação
POST   - /todo           - store   - todo.store   - RECEBE OS DADOS E ADD ITEM
GET    - /todo/{id}      - show    - todo.show    - ITEM INDIVIDUAL
GET    - /todo/{id}/edit - edit    - todo.edit    - FORM DE EDIÇÃO
PUT    - /todo/{id}      - update  - todo.update  - RECEBER OS DADOS E UPDATE ITEM
DELETE - /todo/{id}      - destroy - todo.destroy - DELETE O ITEM
*/


Route::prefix('tarefas')->group(function(){

    Route::get('/', [TarefasController::class, 'list'])->name('tarefas.list'); // Listagem de tarefas

    Route::get('add', [TarefasController::class, 'add'])->name('tarefas.add')->middleware('auth'); // Tela de adição de nova tarefa
    Route::post('add', [TarefasController::class, 'addAction'])->middleware('auth'); // Ação de adição de nova tarefa

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit')->middleware('auth'); // Tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction'])->middleware('auth'); // Ação de edição

    Route::get('delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del')->middleware('auth'); // Ação de deletar

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done')->middleware('auth'); // Marcar resolvido/não.

});


Route::prefix('config')->group(function(){

    Route::get('/', [ConfigController::class, 'index']);
    Route::post('/', [ConfigController::class, 'index']);
    Route::get('permissoes', [ConfigController::class, 'permissoes']);
    Route::get('/info', [ConfigController::class, 'info']);

});

Route::fallback(function(){
    return redirect(route('404'));
});






// Route::get('/noticia/{slug}', function($slug) {
//     echo 'TITULO: '.$slug;
// });

// Route::get('/user/{name}', function($name){
//     echo 'Mostrando usuário de nome: '.$name;
// });

// Route::get('/user/{id}', function($id){
//     echo 'Mostrando usuário com id: '.$id;
// });
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
