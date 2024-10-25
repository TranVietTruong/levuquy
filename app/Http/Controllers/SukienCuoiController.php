<?php

namespace App\Http\Controllers;

use App\Models\CoupleInformation;
use App\Models\LoveStory;
use App\Models\SuKienCuoi;
use App\Models\User;
use App\Models\WebsiteInformation;
use App\Services\UploadImageService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SukienCuoiController extends Controller
{
    public function index(Request $request) {
        $data = SuKienCuoi::where('user_id', Auth::user()->id)->orderBy('order')->orderBy('id')->get();
        if (!count($data)) {
            $data = [
                [
                    'order' => 1,
                    'anh' => 'https://cdn.biihappy.com/ziiweb/website/61990349db8f76231c132068/83d8a5c840b51447ab080ecb9a7de6df.jpeg',
                    'ten_su_kien' => 'LỄ CƯỚI NHÀ NAM',
                    'thoi_gian' => 'December 12 2015',
                    'dia_chi' => 'Tư gia nhà nam',
                    'map' => 'https://maps.app.goo.gl/UToW4fYXuSY8Czoe8',
                ],
                [
                    'order' => 2,
                    'anh' => 'https://cdn.biihappy.com/ziiweb/website/61990349db8f76231c132068/45dfd859dd184042e2a6adaa320ac64b.jpeg',
                    'ten_su_kien' => 'LỄ CƯỚI NHÀ NỮ',
                    'thoi_gian' => 'December 12 2015',
                    'dia_chi' => 'Tư gia nhà nữ',
                    'map' => 'https://maps.app.goo.gl/UToW4fYXuSY8Czoe8',
                ],
            ];
        } else {
            $data = $data->toArray();
        }

        return $this->responseData($data);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'items' => 'required|array',
            'items.*.anh' => 'required|string|max:255',
            'items.*.ten_su_kien' => 'required|string|max:255',
            'items.*.thoi_gian' => 'required|string|max:255',
            'items.*.dia_chi' => 'required|string|max:1000',
            'items.*.map' => 'required|string|max:255',
        ],[
            'items.*.anh.required' => 'Chọn ảnh cho sự kiện của bạn',
            'items.*.ten_su_kien.required' => 'Nhập tên sự kiện cho câu chuyện của bạn',
            'items.*.thoi_gian.required' => 'Chọn thời gian cho sự kiện của bạn',
            'items.*.dia_chi.required' => 'Nhập địa chỉ cho sự kiện của bạn',
            'items.*.map.required' => 'Nhập link google map cho sự kiện của bạn',
        ]);
        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }

        $user = Auth::user();
        SuKienCuoi::where('user_id', $user->id)->delete();

        $items = $request->get('items');
        $data = [];
        foreach ($items as $key => $item) {
            $data[$key]['user_id'] = $user->id;
            $data[$key]['order'] = $key + 1;
            $data[$key]['anh'] = $item['anh'];
            $data[$key]['ten_su_kien'] = $item['ten_su_kien'];
            $data[$key]['thoi_gian'] = $item['thoi_gian'];
            $data[$key]['dia_chi'] = $item['dia_chi'];
            $data[$key]['map'] = $item['map'];
            $data[$key]['created_at'] = Carbon::now();
            $data[$key]['updated_at'] = Carbon::now();
        }
        SuKienCuoi::insert($data);

        return $this->responseSuccess();
    }

}
