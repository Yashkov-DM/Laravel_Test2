<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $dates = ['publishedAt'];

    protected $fillable = [
        'id',
        'title',
        'categoryid',
        'author',
        'publishedAt',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'categoryid', 'id');
    }

    public function like()
    {
        return $this->hasMany(LikeModel::class);
    }
}
