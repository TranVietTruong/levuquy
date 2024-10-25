<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuKienCuoi extends Model
{
    use HasFactory;

    protected $table = 'su_kien_cuoi';

    protected $fillable = [
        'user_id',
        'anh_su_kien',
        'ten_su_kien',
        'thoi_gian',
        'dia_chi',
        'map',
        'order'
    ];
}
