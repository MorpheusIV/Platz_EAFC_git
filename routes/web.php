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
// Route principal(index) avec pagination de 12 post
Route::get('/', function () {
    return view('posts.index', ['posts' => \App\Models\Post::paginate(12)
]);
 })->name('posts.index');

// Route pour le show du post
Route::get('posts/{post}', function (\App\Models\Post $post) {

    return view('posts.show', compact('post'));
})->name('posts.show');

// Route pour les catégories
Route::get('/categories/{category}', function (\App\Models\Category $category) {

    return view('categories.show', compact('category'));
})->name('categories.show');

// Route voyager
Route::group(['prefix' => 'admin'], function () {
    
    Voyager::routes();
});
