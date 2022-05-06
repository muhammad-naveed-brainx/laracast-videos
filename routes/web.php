<?php

use App\Models\Post;
use \App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;


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

    $posts = Post::with('category')->get(); //equivalent to Post::all() but efficient
    return view('posts', ['posts'=> $posts]);
});

Route::get('/posts/{id}', function ($id) {
    // find a post by its slug and send it to a view called 'post'

    $post = Post::findOrFail($id);
    return view('post', ['post' => $post]);

})->where(['post' => '[0-9]+']);

Route::get('/categories/{category:slug}', function (Category $category) {
//    $category = Category::findOrFail($category);
    $posts = $category->posts;
    return view('posts', ['posts'=> $posts]);
});
