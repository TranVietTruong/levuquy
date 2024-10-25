<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoupleInformation extends Model
{
    use HasFactory;

    protected $table = 'couple_informations';

    protected $fillable = [
        'user_id',
        'anh_chu_re',
        'ten_chu_re',
        'ten_chu_re_ngan_gon',
        'ngay_sinh_chu_re',
        'gioi_thieu_chu_re',
        'ho_ten_bo_chu_re',
        'ho_ten_me_chu_re',
        'ten_ngan_hang_chu_re',
        'ten_chu_tai_khoan_chu_re',
        'stk_chu_re',
        'chi_nhanh_chu_re',
        'anh_qr_chu_re',
        'anh_co_dau',
        'ten_co_dau',
        'ten_co_dau_ngan_gon',
        'ngay_sinh_co_dau',
        'gioi_thieu_co_dau',
        'ho_ten_bo_co_dau',
        'ho_ten_me_co_dau',
        'ten_ngan_hang_co_dau',
        'ten_chu_tai_khoan_co_dau',
        'stk_co_dau',
        'chi_nhanh_co_dau',
        'anh_qr_co_dau',
        'updated_by',
        'created_by',
    ];
}
