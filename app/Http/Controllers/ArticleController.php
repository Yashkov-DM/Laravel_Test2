<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller {

    /**
     * Получение всех статей
     *
     * @param int $paginate колличество выводимых страниц
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($limit, $page) {

         $items = ArticleModel::with('category')
             ->paginate($limit, ['*'], 'page', $page)
             ->through(
                 function ($item) {
                    $newitem = [];
                    $newitem['id'] = $item['id'];
                    $newitem['title'] = $item['title'];
                    $newitem['category'] = $item['category']['title'];
                    $newitem['author'] = $item['author'];
                    $newitem['publishedAt'] = $item['publishedAt'];

                    return $newitem;
                }
             );

        $items = collect($items->toArray());
       $header =  ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'];

       return response()->json($items, '200', $header, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Создание статьи
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request) {
        $artical  = ArticleModel::create($request->all());

        return response()->json($artical, 200);
    }

    /**
     * Отображение статей с учётом категории
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($category_id, $limit, $page) {

        $items = ArticleModel::with('category')
            ->where('categoryid', $category_id)
            ->paginate($limit, ['*'], 'page', $page)
            ->through(
                function ($item) {
                    $newitem = [];
                    $newitem['id'] = $item['id'];
                    $newitem['title'] = $item['title'];
                    $newitem['category'] = $item['category']['title'];
                    $newitem['author'] = $item['author'];
                    $newitem['publishedAt'] = $item['publishedAt'];

                    return $newitem;
                }
            );

        $header =  ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'];

        return response()->json($items, '200', $header, JSON_UNESCAPED_UNICODE);
    }
}
