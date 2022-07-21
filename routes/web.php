<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JointableController;
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
    return view('auth.login');
});
//.......................searching route
// Route::get("search",[PostController::class,'search']);
// Route::get('/display',[PostController::class,'show'] );

//............................................suggession route................

Route::get('/autocomplete-search', [PostController::class, 'autocompleteSearch']);

//.....................click check..................
Route::post('/uploadproduct', [PostController::class, 'ds']);
Route::get('/www.google.com/{id}', [PostController::class, 'autocompleteSearch']);

//..........................................show output on different page......
//Route::get('/display?search=/{description}',[PostController::class,'output'] );

Route::get('jointable', [PostController::class, 'show']);


//....................relation check/////////////

Route::get('/data', [PostController::class, 'student']);


//.....................................pdf search.......................
Route::get('/pdf', [PostController::class, 'pdf']);
Route::post('fileupload', [PostController::class, 'pdfstore']);

Route::get('/viewupload', [PostController::class, 'view']);
Route::get('/download/{file}', [PostController::class, 'wq']);
Route::get('/view/{id}', [PostController::class, 'view_pdf']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('wicpacsearch', function () {
		return view('pages.typography');
	})->name('wicpacsearch');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Route::get('/filesearch', function () {

    return view('pages.table_list');
  });

Route::get('/search', [PostController::class, 'filesearch']);


Route::get('/wsearch', [PostController::class, 'apitestt']);


// Route::get('/wsearch', function () {

//     return view('pages.typography');
//   });





  //Route::get('/ty', [PostController::class, 'apitestt']);

