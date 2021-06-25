<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNews;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\ParserService;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index() {
        return view('admin.news.parser', [
            'sources' => Source::all()
        ]);
    }

    public function getNews() {
        $source = Source::find((\request()->get('id')));

        $data = (new ParserService)->getNews($source->url);
        foreach ($data['news'] as $news) {
            $news['category_id'] = $source->category_id;
            (new Admin\NewsController)->store(null, $news);
        }
        return back();
    }
}
