<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $table = 'makers';
    // 更新可能な項目の設定
    protected $fillable = [
        'name',
        'country',
        'image_file'
    ];
    
    Public function wines()
    {
        return $this->hasMany('\App\Wine');
    }

    Public function profile()
    {
        return $this->belongsTo('\App\Profile');
    }
}
