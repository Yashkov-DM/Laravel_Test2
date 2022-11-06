<?php

namespace Database\Seeders;

use App\Models\ArticleModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert( [
                ['title' => 'Blink-182 воссоединилась', 'categoryid' => 1, 'author' => 'Джон Сноу', 'publishedAt' => 1667479844],
                ['title' => 'У Ланы Дель Рей украли ноутбук', 'categoryid' => 1, 'author' => 'Боб Дилан', 'publishedAt' => 1667479894],
                ['title' => 'Тейлор Свифт рассказала об ужасном прослушивании', 'categoryid' => 1, 'author' => 'Том Тейлор', 'publishedAt' => 1667479394],
                ['title' => 'HBO закрыл сериал "Мир дикого запада', 'categoryid' => 2, 'author' => 'Том Тейлор', 'publishedAt' => 1667479892],
                ['title' => 'Какие лучшие фильмы по играм стоит смотреть?', 'categoryid' => 2, 'author' => 'Боб Дилан', 'publishedAt' => 1667479874],
                ['title' => 'Найдена замена Роналду в МЮ', 'categoryid' => 3, 'author' => 'Джон Сноу', 'publishedAt' => 1667479891],
                ['title' => 'Казахстанская футболистка выиграла Кубок России', 'categoryid' => 3, 'author' => 'Джон Сноу', 'publishedAt' => 1667479194],
                ['title' => 'Полузащитник ПСЖ не сыграет до перерыва на ЧМ-2022', 'categoryid' => 3, 'author' => 'Джон Сноу', 'publishedAt' => 1667479832],
                ['title' => 'Популярного рэпера из группы Migos застрелили в США', 'categoryid' => 4, 'author' => 'Том Тейлор', 'publishedAt' => 1667479818],
                ['title' => 'Картину Ван Гога облили томатным супом', 'categoryid' => 4, 'author' => 'Боб Дилан', 'publishedAt' => 1667470994],
                ['title' => 'В Москве открывается выставки об эпохе "оттепели"', 'categoryid' => 4, 'author' => 'Боб Дилан', 'publishedAt' => 1667479144],
            ]
        );
    }
}
