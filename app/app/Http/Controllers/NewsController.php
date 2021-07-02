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
        return view('news.index', [
            'newsList' => News::where(['status' => 'published'])
                ->with('category')
                ->get()->sortByDesc('created_at'),
            'newsCategories' => Category::all()
        ]);
    }

    public function show($id)
    {
        return view('news.show', [
            'news' => News::find($id),
            'newsCategories' => Category::all(),
            'comments' => Comment::where(['news_id' => $id])->get()
        ]);
    }

    public function by_categories(int $id)
    {
        return view('news.by_categories', [
            'category' => Category::find($id),
            'newsList' => News::where(['category_id' => $id, 'status' => 'published'])->get(),
            'newsCategories' => Category::all()
        ]);
    }

    public function order()
    {
        return view('news.order',
        ['newsCategories' => Category::all()]);
    }
}
