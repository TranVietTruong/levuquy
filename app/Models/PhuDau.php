<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuDau extends Model
{
    use HasFactory;

    protected $table = 'phudau';

    protected $fillable = [
        'user_id',
        'anh_phu_re',
        'ten_phu_re',
        'gioi_thieu_phu_re',

        'anh_phu_dau',
        'ten_phu_dau',
        'gioi_thieu_phu_dau',
    ];
}
