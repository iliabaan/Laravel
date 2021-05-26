<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        return view('news.index', [
            'newsList' => $this->newsList,
            'newsCategories' => $this->newsCategory
        ]);
    }

    public function show(int $id)
    {
        return view('news.show', [
            'news' => $this->newsList[$id],
            'newsCategories' => $this->newsCategory
        ]);
    }

    public function by_categories(int $id)
    {
        return view('news.by_categories', [
            'category' => $this->newsCategory[$id],
            'newsList' => $this->newsList,
            'newsCategories' => $this->newsCategory
        ]);
    }
}
