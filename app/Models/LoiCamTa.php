<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoiCamTa extends Model
{
    use HasFactory;

    protected $table = 'loi_cam_ta';

    protected $fillable = [
        'user_id',
        'content'
    ];
}
