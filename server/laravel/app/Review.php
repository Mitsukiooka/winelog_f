<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    // 更新可能な項目の設定
    protected $fillable = [
        'comment',
    ];

    Public function user()
    {
        return $this->belongsTo('\App\User');
    }

    Public function wine()
    {
        return $this->belongsTo('\App\Wine');
    }

    Public function displayReview($comment) 
    {
        return mb_substr($comment, 0, 50, "UTF-8");
    }
}
