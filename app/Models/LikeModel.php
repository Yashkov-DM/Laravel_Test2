<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'id',
        'articleid',
        'userid',
        'created_at',
        'updated_at'
    ];

    public function artical()
    {
        return $this->belongsTo(ArticleModel::class, 'articleid', 'id');
    }
}
