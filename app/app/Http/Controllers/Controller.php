<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $newsList = [
        '1' => ['name' => 'Новость 1', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Спорт'],
        '2' => ['name' => 'Новость 2', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Жизнь'],
        '3' => ['name' => 'Новость 3', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Стиль'],
        '4' => ['name' => 'Новость 4', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Музыка'],
        '5' => ['name' => 'Новость 5', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Культура'],
    ];

    protected array $newsCategory = [
        '1' => 'Спорт',
        '2' => 'Жизнь',
        '3' => 'Стиль',
        '4' => 'Музыка',
        '5' => 'Культура'
    ];
}
