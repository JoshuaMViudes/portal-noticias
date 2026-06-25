<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name('home');
Route::get("/noticia", [HomeController::class, "visualizarNoticias"])->name('visualizar');
Route::get("/contato", [HomeController::class, "contato"])->name('contato');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Rotas do Gerenciamento de Notícias
    Route::get('/dashboard/noticias', [NoticiaController::class, "index"])->name('admin.noticias.index');

    Route::get('/dashboard/noticias/cadastrar', [NoticiaController::class, "create"])->name('admin.noticias.cadastrar');


    //Rotas do Gerenciamento de Categorias
    Route::get('/dashboard/categorias', [CategoriaController::class, "index"])->name('admin.categorias.index');
    Route::get('/dashboard/categorias/cadastrar', [CategoriaController::class, "create"])->name('admin.categorias.cadastrar');
});

require __DIR__ . '/auth.php';
