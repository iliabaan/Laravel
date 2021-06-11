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
        '1' => ['id' => '1', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Спорт'],
        '2' => ['id' => '2', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Жизнь'],
        '3' => ['id' => '3', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Стиль'],
        '4' => ['id' => '4', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Музыка'],
        '5' => ['id' => '5', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit.', 'category' => 'Культура'],
    ];

    protected array $newsCategory = [
        '1' => 'Спорт',
        '2' => 'Жизнь',
        '3' => 'Стиль',
        '4' => 'Музыка',
        '5' => 'Культура'
    ];

    public function comments($id = null) {
        $value = [];
        $comments = file_get_contents('comments.json');
        $comments = json_decode($comments, 1);
        if (!$comments) {
            return [];
        }
        if (!is_null($id)) {
            foreach ($comments as $comment) {
                if ($comment['news_id'] == $id) {
                    array_push($value, $comment);
                }
            }
            return $value;
        }
    }
}
