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
    return view('welcome');
});

//ログインしていない場合のリダイレクトの処理を追加　2020.04.16
//13章 ニュース投稿画面作成により追記
// Route::group(['prefix' => 'admin'],function(){
//     Route::get('news/create','Admin\NewsController@add')->middleware('auth');
// });

Route::group(['prefix' => 'admin'],function(){
    Route::get('news/create','Admin\NewsController@add')->middleware('auth');
    Route::post('news/create','Admin\NewsController@create')->middleware('auth');
    //2020.04.23 15章教材追加 ニュース一覧画面
    Route::get('news','Admin\NewsController@index')->middleware('auth');
    //2020.04.24 16章教材追加　編集画面
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); 
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});


//4【応用】 前章でAdmin/ProfileControllerを作成し、
//add Action, edit Actionを追加しました。web.phpを編集して、
//admin/profile/create にアクセスしたら ProfileController の
//add Action に、admin/profile/edit にアクセスしたら ProfileController 
//の edit Action に割り当てるように設定してください。

//12章 1~3 ログインしていない場合のリダイレクト処理を追加 2020.04.17
Route::group(['prefix' => 'admin'],function(){
    Route::get('profile/create','Admin\ProfileController@add')->middleware('auth');
    Route::get('profile/edit','Admin\ProfileController@edit')->middleware('auth');
//13章 課題3 2020.04.19
    Route::post('profile/create','Admin\ProfileController@create')->middleware('auth');
//13章 課題6 2020.04.19
    Route::post('profile/edit','Admin\ProfileController@update')->middleware('auth');
// //15章 課題3
//     Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth'); 
//     Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth');
//17章 編集画面遷移前の一覧画面 2020.04.27
    Route::get('profile','Admin\ProfileController@index')->middleware('auth');
//17章　一覧画面の削除ボタンでデータ削除
    Route::get('profile/delete', 'Admin\ProfileController@delete')->middleware('auth');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//2020.05.01 18章教材
Route::get('/','NewsController@index');
//2020.05.02 18章課題
Route::get('/profile','ProfileController@index');
