<?php

namespace App\Http\Controllers;

use App\Models\CoupleInformation;
use App\Models\PhuDau;
use App\Models\User;
use App\Models\WebsiteInformation;
use App\Models\WeddingEvent;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PhuDauController extends Controller
{
    public function index(Request $request) {
        $data = PhuDau::where('user_id', Auth::user()->id)->first();
        if (!$data) {
            $data = [
                'anh_phu_re' => 'https://i.imgur.com/4de2gue.jpg',
                'ten_phu_re' => 'Nguyễn Văn An',
                'gioi_thieu_phu_re' => 'Chàng trai sinh năm 1996 tại Bình Dương, từng là sinh viên Đại học Kinh tế TP. Hồ Chí Minh. Hiện tại, đang làm nhân viên tín dụng ngân hàng.',

                'anh_phu_dau' => 'https://i.imgur.com/4de2gue.jpg',
                'ten_phu_dau' => 'Trần Thị Hòa',
                'gioi_thieu_phu_dau' => 'Là cô gái đến từ vùng đất Cố Đô “Huế mộng Huế mơ” dịu dàng, nết na và thùy mị. Với nhiều tài lẻ như biết nấu ăn, cắm hoa, thêu thùa may vá.',
            ];
        } else {
            $data = $data->toArray();
        }

        return $this->responseData($data);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'anh_phu_re' => 'max:255',
            'ten_phu_re' => 'max:255',
            'gioi_thieu_phu_re' => 'max:1000',

            'anh_phu_dau' => 'max:255',
            'ten_phu_dau' => 'max:255',
            'gioi_thieu_phu_dau' => 'max:1000',

        ]);

        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }
        $user = Auth::user();

        $phudau = PhuDau::where('user_id', $user->id)->first();
        if (!$phudau) {
            $phudau = new PhuDau();
        }

        $params = $request->all();
        $phudau->fill($params);
        $phudau->user_id = $user->id;
        $phudau->save();

        return $this->responseSuccess();
    }

}
