<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function categoriesList(): \Illuminate\Support\Collection
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'description'])
            ->get();
    }

    public function category(int $id): object
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'description'])
            ->find($id);
    }
}
