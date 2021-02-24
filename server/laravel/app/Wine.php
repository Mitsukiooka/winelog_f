<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    protected $table = 'wine';
    // 更新可能な項目の設定
    protected $fillable = [
        'name',
        'country',
        'kind',
        'type',
        'image_file',
        'image_file_path'
    ];//
}
