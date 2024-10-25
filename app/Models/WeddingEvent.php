<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingEvent extends Model
{
    use HasFactory;

    protected $table = 'wedding_events';

    protected $fillable = [
        'user_id',
        'anh_su_kien_nam',
        'ten_su_kien_nam',
        'thoi_gian_su_kien_nam',
        'dia_chi_nam',
        'map_nam',

        'anh_su_kien_nu',
        'ten_su_kien_nu',
        'thoi_gian_su_kien_nu',
        'dia_chi_nu',
        'map_nu'
    ];
}
