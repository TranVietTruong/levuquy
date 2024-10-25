<?php

namespace App\Http\Controllers;

use App\Models\CoupleInformation;
use App\Models\LoveStory;
use App\Models\User;
use App\Models\WebsiteInformation;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LoveStoryController extends Controller
{
    public function index(Request $request) {
        $data = LoveStory::where('user_id', Auth::user()->id)->orderBy('order')->orderBy('id')->get();
        if (!count($data)) {
            $data = [
                [
                    'order' => 1,
                    'anh' => 'https://cdn.biihappy.com/ziiweb/default/website/383875f7dbad0c73b240243aeecb74dd.jpeg',
                    'tieu_de' => 'Bạn có tin vào tình yêu online không?',
                    'thoi_gian' => 'December 12 2015',
                    'noi_dung' => 'Tôi đã từng không tin vào tình yêu online. Đã từng nghĩ làm sao có thể thích một người chưa từng gặp mặt? Vậy mà giờ đây tôi lại đang như vậy, bây giờ tôi đã hiểu: thế giới ảo tình yêu thật đấy!!! Ngày ấy vu vơ đăng một dòng status trên facebook than thở, vu vơ đùa giỡn nói chuyện với một người xa lạ chưa từng quen. Mà nào hay biết, 4 năm sau người ấy lại là chồng mình.',
                ],
                [
                    'order' => 2,
                    'anh' => 'https://cdn.biihappy.com/ziiweb/default/website/383875f7dbad0c73b240243aeecb74dd.jpeg',
                    'tieu_de' => 'Bạn có tin vào tình yêu online không?',
                    'thoi_gian' => 'December 12 2015',
                    'noi_dung' => 'Tôi đã từng không tin vào tình yêu online. Đã từng nghĩ làm sao có thể thích một người chưa từng gặp mặt? Vậy mà giờ đây tôi lại đang như vậy, bây giờ tôi đã hiểu: thế giới ảo tình yêu thật đấy!!! Ngày ấy vu vơ đăng một dòng status trên facebook than thở, vu vơ đùa giỡn nói chuyện với một người xa lạ chưa từng quen. Mà nào hay biết, 4 năm sau người ấy lại là chồng mình.',
                ]
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
            'items.*.tieu_de' => 'required|string|max:255',
            'items.*.thoi_gian' => 'required|string|max:255',
            'items.*.noi_dung' => 'required|string|max:1000',
        ], [
            'items.*.anh.required' => 'Chọn ảnh cho câu chuyện của bạn',
            'items.*.tieu_de.required' => 'Chọn tiêu đề cho câu chuyện của bạn',
            'items.*.thoi_gian.required' => 'Chọn thời gian cho câu chuyện của bạn',
            'items.*.noi_dung.required' => 'Nhập nội dung cho câu chuyện của bạn',
        ]);
        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }

        $user = Auth::user();
        LoveStory::where('user_id', $user->id)->delete();

        $items = $request->get('items');
        $data = [];
        foreach ($items as $key => $item) {
            $data[$key]['user_id'] = $user->id;
            $data[$key]['order'] = $key + 1;
            $data[$key]['anh'] = $item['anh'];
            $data[$key]['tieu_de'] = $item['tieu_de'];
            $data[$key]['thoi_gian'] = $item['thoi_gian'];
            $data[$key]['noi_dung'] = $item['noi_dung'];
        }
        LoveStory::insert($data);

        return $this->responseSuccess();
    }

}
