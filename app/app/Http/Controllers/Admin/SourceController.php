<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNews;
use App\Models\Category;
use App\Models\Source;
use App\Services\ParserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Jobs\NewsParsingJob;
use Illuminate\Support\Facades\Redis;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.source.index', [
            'sources' => Source::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.source.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $fields = $request->only('title', 'url', 'description', 'category_id');

        $source = new Source();
        $source->fill($fields)->save();

        if ($source) {
            return redirect()->route('source.index');
        } else return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(Request $request, Source $source): RedirectResponse
    {
        $fields = $request->only('title', 'url', 'description', 'category_id');

        $source = $source->fill($fields)->save();
        if ($source) {
            return redirect()->route('source.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return RedirectResponse
     */
    public function destroy(Source $source): RedirectResponse
    {
        $source->delete();
        return back();
    }

    /**
     * @param Source $source
     * @return RedirectResponse
     */
    public function parse(Source $source): RedirectResponse
    {
        NewsParsingJob::dispatch($source);
        return back();
    }

    /**
     * @return RedirectResponse
     */
    public function parseAll(): RedirectResponse
    {
        $sources = Source::all();
        foreach ($sources as $source) {
            NewsParsingJob::dispatch($source);
        }
        return back();
    }
}
