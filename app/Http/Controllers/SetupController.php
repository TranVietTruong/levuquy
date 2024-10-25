<?php

namespace App\Http\Controllers;

use App\Models\PhuDau;
use App\Models\Setup;
use App\Models\WebsiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SetupController extends Controller
{
    public function index(Request $request) {
        $website = WebsiteInformation::where('user_id', Auth::user()->id)->first();

        $templateId = 1;
        if ($website && $website->template_id) {
            $templateId = $website->template_id;
        }

        $data = Setup::where('user_id', Auth::user()->id)->where('template_id', $templateId)->first();
        if (!$data) {
            $data = null;
        } else {
            $data = (object)json_decode($data->data);
        }

        return $this->responseData($data);
    }

    public function store(Request $request) {
        $user = Auth::user();

        $website = WebsiteInformation::where('user_id', Auth::user()->id)->first();

        $templateId = 1;
        if ($website && $website->template_id) {
            $templateId = $website->template_id;
        }

        $setup = Setup::where('user_id', $user->id)->where('template_id', $templateId)->first();
        if (!$setup) {
            $setup = new Setup();
            $setup->template_id = $templateId;
        }

        $setup->data = json_encode($request->get('data', JSON_UNESCAPED_UNICODE ));
        $setup->user_id = $user->id;
        $setup->save();

        return $this->responseSuccess();
    }

}
