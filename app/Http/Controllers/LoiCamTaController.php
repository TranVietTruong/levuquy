<?php

namespace App\Http\Controllers;

use App\Models\CoupleInformation;
use App\Models\LoiCamTa;
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

class LoiCamTaController extends Controller
{
    public function index(Request $request) {
        $data = LoiCamTa::where('user_id', Auth::user()->id)->first();
        if (!$data) {
            $data = [
                'content' =>  '"Một cuộc hôn nhân thành công đòi hỏi phải yêu nhiều lần, và luôn ở cùng một người" - Chúc cho hai bạn sẽ có được một cuộc hôn nhân viên mãn, trăm năm hạnh phúc',
            ];
        } else {
            $data = $data->toArray();
        }

        return $this->responseData($data);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'content' => 'max:15000',
        ]);

        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }
        $user = Auth::user();

        $item = LoiCamTa::where('user_id', $user->id)->first();
        if (!$item) {
            $item = new LoiCamTa();
        }

        $params = $request->all();
        $item->fill($params);
        $item->user_id = $user->id;
        $item->save();

        return $this->responseSuccess();
    }

}
