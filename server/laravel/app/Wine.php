<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    protected $table = 'wines';
    // 更新可能な項目の設定
    protected $fillable = [
        'name',
        'country',
        'kind',
        'type',
        'image_file',
        'maker_id',
        'color',
        'taste',
        'aroma',
        'comment'
    ];

    Public function maker()
    {
        return $this->belongsTo('\App\Maker');
    }

    Public function user()
    {
        return $this->belongsTo('\App\User');
    }

    Public function reviews()
    {
        return $this->hasMany('\App\Review');
    }
}
