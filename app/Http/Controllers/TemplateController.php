<?php

namespace App\Http\Controllers;

use App\Models\CoupleInformation;
use App\Models\PhuDau;
use App\Models\Template;
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

class TemplateController extends Controller
{
    public function index(Request $request) {
        $template = Template::where('status', 1)->get();
        $userTemplate = WebsiteInformation::where('user_id', Auth::user()->id)->first();
        if ($userTemplate && $userTemplate->template_id) {
            $templateId = $userTemplate->template_id;
        } else {
            $templateId = 1;
        }

        $data = [
            'templates' => $template,
            'template_user' => $templateId
        ];

        return $this->responseData($data);
    }

    public function store(Request $request) {
        $templateId = $request->get('template_id');

        $websiteInfo = WebsiteInformation::where('user_id', Auth::user()->id)->first();
        if (!$websiteInfo) {
            $websiteInfo = new WebsiteInformation();
        }

        $websiteInfo->template_id = $templateId;
        $websiteInfo->user_id = Auth::user()->id;
        $websiteInfo->save();
        return $this->responseSuccess();
    }

}
