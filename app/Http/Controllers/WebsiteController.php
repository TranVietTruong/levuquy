<?php

namespace App\Http\Controllers;

use App\Models\CoupleInformation;
use App\Models\User;
use App\Models\WebsiteInformation;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class WebsiteController extends Controller
{
    public function index(Request $request) {
        $data = WebsiteInformation::where('user_id', Auth::user()->id)->first();
        if (!$data) {
            $data = [
                'link_website' =>  'le-cuoi-cua-chung-toi',
                'anh_website' =>  'https://i.imgur.com/4de2gue.jpg',
                'nhac_website' => 'https://cdn.biihappy.com/ziiweb/wedding-musics/BeautifulInWhite-ShaneFilan-524801.mp3',
                'ten_website' => 'Wedding sites',
                'mo_ta_website' => 'Our wedding date: 2024-08-31 | Tìm được một người yêu bạn mà không cần lý do, và tắm cho người đó bằng lý do, đó là hạnh phúc cuối cùng',
                'video_cuoi' => '',
                'ngay_cuoi' => '',
                'cau_chuyen_tinh_yeu' => 1,
                'su_kien_cuoi' => 1,
                'phu_dau_phu_re' => 1,
                'album' => 1,
                'loi_cam_ta' => 1,
            ];
        } else {
            $data = $data->toArray();
        }

        $data['anh_website'] = $data['anh_website'] ?? 'https://cdn.biihappy.com/ziiweb/default/website/galleries/61990322c41d7b37de534633/large.jpg';
        return $this->responseData($data);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'link_website' => 'required|max:255',
            'anh_website' => 'max:255',
            'nhac_website' => 'max:255',
            'ten_website' => 'max:255',
            'mo_ta_website' => 'max:255',
            'video_cuoi' => 'max:255'

        ], [
            'link_website.required' => 'Bạn hãy điền link của website nhé',
            'link_website.max' => 'Link tối đa 255 kí tự',
            'anh_website.max' => 'Ảnh không hợp lệ',
            'nhac_website.max' => 'Nhạc không hợp lệ',
            'ten_website.max' => 'Tên website tối đa 255 kí tự',
            'mo_ta_website.max' => 'Mô tả website tối đa 255 kí tự',
        ]);

        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }
        $user = Auth::user();

        $linkWebsite = Str::slug($request->get('link_website'));
        $check = WebsiteInformation::where('link_website', $linkWebsite)->where('user_id', '!=', $user->id)->count();
        if ($check) {
            return $this->responseBadRequest('Link đã tồn tại, bạn vui lòng chọn link khác nhé');
        }

        $websiteInfo = WebsiteInformation::where('user_id', $user->id)->first();
        if (!$websiteInfo) {
            $websiteInfo = new WebsiteInformation();
        }

        $params = $request->all();
        $params['link_website'] = $linkWebsite;
        $websiteInfo->fill($params);
        if ($request->get('video_cuoi')) {
            $websiteInfo->id_video_cuoi = $this->getIdYoutube($request->get('video_cuoi'));
        }
        $websiteInfo->user_id = $user->id;
        $websiteInfo->save();

        return $this->responseSuccess();
    }

    public function getIdYoutube($url) {
        try {
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $url, $matches);
                return $matches[1];
            }
            return $url;
        } catch (\Exception $e) {
            return '';
        }
    }
}
