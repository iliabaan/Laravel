<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNews;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.news.index', [
            'newsList' => News::all()->sortByDesc('created_at')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNews|null $request
     * @param null $fields
     * @return RedirectResponse
     */
    public function store(CreateNews $request, $fields = null): RedirectResponse
    {
        if (is_null($fields)) {
            $fields = $request->only('category_id', 'title', 'content', 'image', 'status');

            $news = new News();
            $news->fill($fields)->save();
        } else {
            $news = new News();
            $news->fill(['category_id' => $fields['category_id'], 'title' => $fields['title'],
                'content' => $fields['description'], 'image' => null, 'status' => 'published'])->save();
        }
        if ($news) {
            return redirect()->route('news.index');
        } else return back();
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function show(News $news)
    {
        return view('admin.news.show', [
            'news' => $news,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $fields = $request->only('category_id', 'title', 'content', 'image', 'status');

        $news = $news->fill($fields)->save();
        if ($news) {
            return redirect()->route('news.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        if ($news->delete()) {
            $news->status = 'delete';
            $news->save();
        }
        return redirect()->route('news.index');
    }
}
