<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/**
 * Route::get       | Consultar
 * Route::post      | Guardar
 * Route::delete    | Eliminar
 * Route::put       | Actualizar
 */

Route::get('/', function () {
    return view('home');
});

Route::get('blog', function() {
    $posts = [
        ['id' => 1, 'title' => 'PHP', 'slug' => 'php' ],
        ['id' => 2, 'title' => 'laravel', 'slug' => 'laravel' ],
    ];
    return view('blog', ['posts' => $posts]);
});

Route::get('blog/{slug}', function($slug) {
    //consulta a base de datos
    $post = $slug; 
    return view('post', ['post' => $post]);
});

// Route::get('buscar', function(Request $request) {
//     //consulta a base de datos
//     return $request->all();
// });