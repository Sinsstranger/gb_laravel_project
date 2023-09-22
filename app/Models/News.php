<?php

namespace App\Models;

use App\Traits\TModelGetOneByField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory, TModelGetOneByField;

    protected $fillable = [
        'title',
        'author',
        'status',
        'url_slug',
        'description',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
