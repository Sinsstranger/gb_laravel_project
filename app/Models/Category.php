<?php

namespace App\Models;

use App\Traits\TModelGetOneByField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, TModelGetOneByField;

    protected $fillable = [
        'title',
        'url_slug',
        'description',
        'created_at',
    ];
    public function news(){
        return $this->hasMany(News::class, 'category_id');
    }
}
