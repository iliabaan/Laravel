<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = new News();
        $category = new Category();
        $newsList = $news->newsList();
        $categoriesList =$category->categoriesList();

        return view('news.index', [
            'newsList' => $newsList,
            'newsCategories' => $categoriesList
        ]);
    }

    public function show(int $id)
    {
        $news = new News();
        $newsOne = $news->news($id);

        $category = new Category();
        $categoriesList = $category->categoriesList();

        $comment = new Comment();
        $commentsList = $comment->commentsById($id);

        return view('news.show', [
            'news' => $newsOne,
            'newsCategories' => $categoriesList,
            'comments' => $commentsList
        ]);
    }

    public function by_categories(int $id)
    {
        $news = new News();
        $category = new Category();
        $newsList = $news->newsByCategories($id);
        $categoryOne = $category->category($id);
        $categoriesList = $category->categoriesList();

        return view('news.by_categories', [
            'category' => $categoryOne,
            'newsList' => $newsList,
            'newsCategories' => $categoriesList
        ]);
    }

    public function order()
    {
        $category = new Category();
        $categoriesList = $category->categoriesList();
        return view('news.order',
        ['newsCategories' => $categoriesList]);
    }
}
