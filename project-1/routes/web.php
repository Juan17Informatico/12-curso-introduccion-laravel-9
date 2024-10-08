<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;


/**
 * Route::get       | Consultar
 * Route::post      | Guardar
 * Route::delete    | Eliminar
 * Route::put       | Actualizar
 */

 // Route::get('buscar', function(Request $request) {
//     //consulta a base de datos
//     return $request->all();
// });

// Route::get('/', [PageController::class, 'home'])->name('home');

// Route::get('blog', [PageController::class, 'blog'])->name('blog');

// Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');

Route::controller(PageController::class)->group(function() {
    
    Route::get('/', 'home')->name('home');
    Route::get('blog/{post:slug}', 'post')->name('post');

}); 

Route::redirect('dashboard', 'posts')->name('dashboard');

Route::resource('posts', PostController::class)->middleware(['auth'])->except(['show']);

require __DIR__.'/auth.php';