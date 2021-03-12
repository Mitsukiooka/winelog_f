<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    // 更新可能な項目の設定
    protected $fillable = [
        'user_id',
        'twitter',
        'instagram',
        'facebook',
        'image_file',
        'favoriteWine',
        'favoriteMaker'
    ];

    Public function user()
    {
        return $this->belongsTo('\App\User');
    }

    Public function favoriteWine() 
    {
        return $this->hasMany('\App\Wine');
    }

    Public function favoriteMaker()
    {
        return $this->hasMany('\App\Maker');
    }
}
