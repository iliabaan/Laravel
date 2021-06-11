<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function newsList(): \Illuminate\Support\Collection
    {
        return DB::table($this->table)
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->select(['news.id', 'news.title', 'news.content', 'categories.title as category_title', 'news.created_at'])
            ->get();
    }

    public function newsByCategories(int $id): \Illuminate\Support\Collection
    {
        return DB::table($this->table)
        ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->select(['news.id', 'news.title', 'news.content', 'categories.title as category_title', 'news.created_at'])
            ->where('category_id', '=', $id)
            ->get();
    }

    public function news(int $id): object
    {
        return DB::table($this->table)
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->select(['news.id', 'news.title', 'news.content', 'categories.title as category_title', 'news.created_at'])
            ->where('news.id', '=', $id)
            ->first();
    }
}
