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

    public function getReviewByUserId($wine, $user_id)
    {
        return $wine
            ->reviews()
            ->where('user_id', $user_id)
            ->get();
    }

    public function favorite_users()
    {
        return $this->belongsToMany(User::class,'favorites','wine_id','user_id')->withTimestamps();
    }

}
