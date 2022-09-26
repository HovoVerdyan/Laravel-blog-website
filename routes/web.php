<?php

use App\HTTP\Controllers\HomeController;
use App\HTTP\Controllers\AboutController;
use App\HTTP\Controllers\PostController;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'home'])
  ->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])
  ->name('contact.index');
Route::get('/single', AboutController::class);

Route::resource('posts', PostController::class);
//->only(['index', 'show', 'create', 'store', 'edit', 'update']);


// Route::get('/req', function (Request $request) use($posts,$postsx) {
//     // dd(request()->all());
//     dd((int)request()->query('name'));

//     return "I am footballer";

// })->name('hi.index');


// Route::get('/posts/{id}', function ($id) use($posts,$postsx) {

//     abort_if(!isset($posts[$id]), 404);

//     return view('posts.show', ['post' => $posts[$id], 'postsx' => $postsx]);

// })->name('hi.index');

// Route::get('/recent-posts/{recent_posts?}', function ($id = 20) {
//     return "Posts from  days ago " . $id;
// })->name('hi.recent');

// Route::prefix('/fun')->name('fun.')->group(function() use ($posts) {
//     Route::get('/responses', function() {
//         return response($posts, 201)
//           ->header('Content-Type', 'application/json')
//           ->cookie('MY_COOKIE', 'Hovhannes Verdyan', 3600);
//     } );
    
//     Route::get('/redirect', function() {
//         return redirect('/posts/1');
//     });
    
//     Route::get('/back', function() {
//         return back();
//     });
    
//     Route::get('/named-root', function() {
//         return redirect()->route('hi.index', ['id' => 2]);
//     });
    
//     Route::get('/away', function() {
//         return redirect()->away('https://google.com');
//     });
    
//     Route::get('/download', function() {
//         return response()->download(public_path('/IMG.jpg'), 'face.jpg');
//     });
// });





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
