<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'category_id', 'title', 'image', 'content', 'status'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
