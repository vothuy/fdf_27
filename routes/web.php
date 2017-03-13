<?php
Route::pattern('id','([0-9]+)');
Route::pattern('slug','(.*)');
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



Route::group(['prefix' => 'auth', 'namespace'=> 'Auth'], function () {

    Route::get('login', [
      'uses' => 'AuthController@getLogin',
      'as' => 'auth.login'
      ]);

    Route::post('login', [
      'uses' => 'AuthController@postLogin',
      'as' => 'auth.login'
      ]);
  
    Route::get('logout', [
      'uses' => 'AuthController@logout',
      'as' => 'auth.logout'
      ]);
});

Route::group(['middleware' => 'localization', 'prefix' => Session::get('locale')], function() {

      Auth::routes();

      Route::get('/home', 'HomeController@index');

      Route::post('/lang', [
          'as' => 'switchLang',
          'uses' => 'LangController@postLang',
      ]);

      Route::get('/', function () {
          return view('welcome');
      });
});


Route::group(['prefix' => 'admin'], function(){
    Route::resource('user', 'Admin\UserController');
  });
