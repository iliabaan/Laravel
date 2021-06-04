<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public function commentsList(): \Illuminate\Support\Collection
    {
        return DB::table($this->table)
            ->select(['id', 'username', 'content', 'news_id', 'created_at'])
            ->get();
    }

    public function commentsById($id)
    {
        return DB::table($this->table)
            ->select(['id', 'user_name', 'content', 'news_id', 'created_at'])
            ->where('news_id', '=', $id)
            ->get();
    }

    public function comment(int $id): object
    {
        return DB::table($this->table)
            ->select(['id', 'username', 'content', 'news_id', 'created_at'])
            ->find($id);
    }
}
