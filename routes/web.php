<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return 'you are admin';
})->middleware(['auth', 'auth.admin']);


// Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
//     Route::resource('/user', 'UserController', ['except' => ['show', 'create', 'store']]);
// });

// Route::namespace('Admin')
// ->prefix('admin')
// ->name('admin.')
// ->middleware(['auth', 'auth.admin'])
// ->group(function(){
//     Route::resource('/user', 'UserController', ['except' => ['show', 'create', 'store']]);    
//     // Route::get('/impersonate/user/{id}', 'ImpersonateController@index')->name('impersonate');
// });



Route::namespace('Admin')
->prefix('admin')
->name('admin.')
->middleware(['auth', 'auth.admin', 'verified'])
->group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
    // Route::get('/impersonate/user/{id}', 'ImpersonateController@index')->name('impersonate');
});


Route::group(['middleware' => 'auth'], function () {

    // Route Untuk Page Barang

    Route::get('/barang/index', 'Barang\\BarangController@index');
    
    Route::group(['middleware' => ['auth.admin']], function (){
        Route::get('/barang/create', 'Barang\\BarangController@create');
        Route::post('/barang/store', 'Barang\\BarangController@store');
        Route::get('/barang/{id}/edit', 'Barang\\BarangController@edit');
        Route::post('/barang/{id}/update', 'Barang\\BarangController@update');
        Route::get('/barang/{id}/delete', 'Barang\\BarangController@destroy');

        

    });
    
    Route::get('/barang/pinjam/{id}', 'Barang\\BarangController@formpinjam');
    Route::post('/barang/{idBarang}/pinjam', 'Barang\\BarangController@pinjam');
    // Route::get('/barang/{idBarang}/kembalikan', 'Barang\\BarangController@kembali');

    // Route untuk penyimpanan (storage atau inventory)

    Route::get('/inventory/index', 'Barang\\BarangController@indexInventory');
    
    
    

    // Route::post('/laporanperkembangan/store', 'middle\\programController@storelaporanperkembangan');
    
});
// Route::namespace('Admin')
// ->prefix('admin')
// ->name('admin.')
// ->middleware(['auth', 'auth.admin'])
// ->group(function(){
//     Route::get('/user/index', 'Admin\\UserController@index');
//     Route::get('/user/{user}/edit', 'Admin\\UserController@edit');
// });

