<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoveStory extends Model
{
    use HasFactory;

    protected $table = 'love_stories';

    protected $fillable = [
        'user_id',
        'anh',
        'tieu_de',
        'thoi_gian',
        'noi_dung',
        'order'
    ];
}
