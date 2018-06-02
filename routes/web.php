<?php
use App\User;

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


Route::get('user/dashboard', function() {
    dd('user');
});

Route::get('admin/dashboard', function() {
    dd('admin');
});

Route::get('superadmin/dashboard', function() {
    dd('superadmin');
});

// Route::get('apis/users',function(){
//     return response()->json([
//         'columns' => ['name','email'],
//         'total' => User::count(),
//         'rows' => User::all(),
//     ]);
// })->name('users');


Route::group(['prefix' => 'users'], function(){
    Route::get('/', 'UserController@index')->name('users');
    Route::post('/s', 'UserController@search')->name('searchUser');
    
});