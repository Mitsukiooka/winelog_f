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
        'image_file'
    ];

    Public function maker()
    {
        return $this->belongsTo('\App\Maker');
    }
}
