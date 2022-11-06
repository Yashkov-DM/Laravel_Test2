<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Маршрут для получение списка пользователей поставивших лайк статье
Route::get('like/{articleid}', 'LikeController@showlike');

// Маршрут поставить/снять лайка
Route::post('like', 'LikeController@putlike');

//Получение всех статей
Route::get('article/{limit}/{page}', 'ArticleController@index');

//Добавление статьи
Route::post('article/create', 'ArticleController@create');

//Получение статей по категориям
Route::get('article/category/{category_id}/{limit}/{page}', 'ArticleController@show');
