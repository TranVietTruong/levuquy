<?php

namespace App\Http\Controllers;

use App\Models\CoupleInformation;
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

class EventController extends Controller
{
    public function index(Request $request) {
        $data = WeddingEvent::where('user_id', Auth::user()->id)->first();
        if (!$data) {
            $data = [
                'anh_su_kien_nam' =>  'https://cdn.biihappy.com/ziiweb/default/website/eee1cb36b560f0d80f513c4e9be666db.png',
                'ten_su_kien_nam' =>  'Lễ cưới nhà nam',
                'thoi_gian_su_kien_nam' => '2024-09-19 00:00:00',
                'dia_chi_nam' => '120A Thôn Đào Đặng, Trung Nghĩa, TP Hưng Yên',
                'map_nam' => 'https://maps.app.goo.gl/UToW4fYXuSY8Czoe8',

                'anh_su_kien_nu' =>  'https://cdn.biihappy.com/ziiweb/default/website/7744fc9739685fe61c53cd8fe2cf7e52.png',
                'ten_su_kien_nu' =>  'Lễ cưới nhà nữ',
                'thoi_gian_su_kien_nu' => '2024-09-19 00:00:00',
                'dia_chi_nu' => '120A Thôn Đào Đặng, Trung Nghĩa, TP Hưng Yên',
                'map_nu' => 'https://maps.app.goo.gl/UToW4fYXuSY8Czoe8'
            ];
        } else {
            $data = $data->toArray();
        }

        $data['anh_su_kien_nam'] = $data['anh_su_kien_nam'] ?? 'https://cdn.biihappy.com/ziiweb/default/website/eee1cb36b560f0d80f513c4e9be666db.png';
        $data['anh_su_kien_nu'] = $data['anh_su_kien_nu'] ?? 'https://cdn.biihappy.com/ziiweb/default/website/7744fc9739685fe61c53cd8fe2cf7e52.png';
        return $this->responseData($data);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'anh_su_kien_nam' => 'max:255',
            'ten_su_kien_nam' => 'max:255',
            'thoi_gian_su_kien_nam' => 'max:255',
            'dia_chi_nam' => 'max:255',
            'anh_su_kien_nu' => 'max:255',
            'ten_su_kien_nu' => 'max:255',
            'thoi_gian_su_kien_nu' => 'max:255',
            'dia_chi_nu' => 'max:255',

        ]);

        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }
        $user = Auth::user();

        $websiteInfo = WeddingEvent::where('user_id', $user->id)->first();
        if (!$websiteInfo) {
            $websiteInfo = new WeddingEvent();
        }

        $params = $request->all();
        $websiteInfo->fill($params);
        $websiteInfo->user_id = $user->id;
        $websiteInfo->save();

        return $this->responseSuccess();
    }

}
