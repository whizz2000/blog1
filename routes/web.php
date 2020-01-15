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

Route::get('/hello', function () {
    echo 'hello';
});

//Route::get('/today','IndexController@test');

//Route::view('/login','login');
Route::match(['get','post'],'/login','IndexController@login');

Route::post('/dologin','IndexController@dologin');

//Route::post('/lists','StudentController@lists');

Route::get('/goods/{id}/{name?}','IndexController@getgoods')->where('id','\d+');

//一套增删改查
Route::prefix('brand')->middleware('checklogin')->group(function(){
Route::get('create','BrandController@create');

Route::post('store','BrandController@store');

Route::get('/index','BrandController@index');

Route::get('edit/{id}','BrandController@edit');

Route::post('/update/{id}','BrandController@update');

//Route::post('/del/{id}','BrandController@destroy');
Route::get('/del/{id}','BrandController@destroy');

Route::get('checkOnly','BrandController@checkOnly');

Route::get('check','BrandController@checkOnly');
});

//文章表的增删改查

Route::prefix('article')->middleware('checklogin')->group(function(){
Route::get('create','ArticleController@create');
    
Route::post('store','ArticleController@store');
    
Route::get('/index','ArticleController@index');
    
Route::get('edit/{id}','ArticleController@edit');
    
Route::post('/update/{id}','ArticleController@update');
    
Route::get('/del/{id}','ArticleController@destroy');

});

//小区表
Route::prefix('building')->middleware('checklogin')->group(function(){
    Route::get('create','BuildingController@create');

    Route::post('store','BuildingController@store');

    Route::get('/index','BuildingController@index');

    Route::get('edit/{id}','BuildingController@edit');

    Route::post('/update/{id}','BuildingController@update');

    Route::get('/del/{id}','BuildingController@destroy');

});

//商品表

Route::prefix('goods')->group(function(){

Route::get('create','GoodsController@create');

Route::post('store','GoodsController@store');

Route::get('/index','GoodsController@index');

Route::get('edit/{id}','GoodsController@edit');

Route::post('update/{id}','GoodsController@update');

Route::get('/del/{id}','GoodsController@destroy');

Route::get('show/{id}','GoodsController@show');

Route::post('addcart','GoodsController@addcart');
});

//员工表的增删改查
Route::get('man/create','ManController@create');

Route::post('man/store','ManController@store');

Route::get('/man/index','ManController@index');

Route::get('/man/edit/{id}','ManController@edit');

Route::post('/man/update/{id}','ManController@update');

Route::get('/man/del/{id}','ManController@destroy');


//学生表的增删改查
Route::get('/student/create','StudentController@create');

Route::post('/student/store','StudentController@store');

Route::get('/student/index','StudentController@index');

Route::get('/student/edit/{id}','StudentController@edit');

Route::post('/student/update/{id}','StudentController@update');

Route::get('/student/del/{id}','StudentController@destroy');


//图书表的增删改查
Route::get('/book/create','BookController@create');

Route::post('/book/store','BookController@store');

Route::get('/book/index','BookController@index');

Route::get('/book/edit/{id}','BookController@edit');

Route::post('/book/update/{id}','BookController@update');

Route::get('/book/del/{id}','BookController@destory');


//分类表
Route::get('/category/create','CategoryController@create');

Route::post('/category/store','CategoryController@store');

Route::get('/category/index','CategoryController@index');

Route::get('/category/edit/{id}','CategoryController@edit');

Route::post('/category/update/{id}','CategoryController@update');

Route::get('/category/del/{id}','CategoryController@destroy');

//新闻表

Route::get('/new/create','NewController@create');

Route::post('/new/store','NewController@store');

Route::get('/new/index','NewController@index');

Route::get('/new/edit/{id}','NewController@edit');

Route::post('/new/update/{id}','NewController@update');

Route::get('/new/del/{id}','NewController@destroy');

//登陆表

Route::view('/login','admin.login.login');

Route::post('/dologin','LoginController@dologin');

Route::get('/logout','LoginController@logout');

Route::get('send','GoodsController@sendemail');



Route::prefix('thing')->group(function(){

    Route::get('create','ThingController@create');
    
    Route::post('store','ThingController@store');
    
    Route::get('/index','ThingController@index');
    
    Route::get('/del/{id}','ThingController@destroy');
    
    });