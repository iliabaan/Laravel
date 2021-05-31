<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Request $request)
    {
        $db = file_get_contents('comments.json');
        $db = json_decode($db, 1);
        if (!isset($db)) {
            $db = [];
        }

        $comment['news_id'] = $request->input('id');
        $comment['name'] = $request->input('name');
        $comment['content'] = $request->input('comment');
        $comment['date'] = date('d-m-Y H:m');

        array_push($db, $comment);
        $db = json_encode($db);
        file_put_contents('comments.json', $db);
        return back()->withInput();
    }
}
