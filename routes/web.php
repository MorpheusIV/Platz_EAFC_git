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

Route::get('/', function () {
    return view('posts.index', ['posts' => \App\Models\Post::paginate(15)
]);
 })->name('posts.index');

Route::get('posts/{post}', function (\App\Models\Post $post) {
    return view('posts.show', compact('post'));
})->name('posts.show');

Route::get('/categories/{category}/{slug}', [Categorie::class, 'show'])
     ->name('categories.show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
