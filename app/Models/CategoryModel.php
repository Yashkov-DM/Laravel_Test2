<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title',
        'created_at',
        'updated_at'
    ];

    public function article()
    {
        return $this->hasMany(ArticleModel::class);
    }
}
