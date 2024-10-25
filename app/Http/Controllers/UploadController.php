<?php

namespace App\Http\Controllers;

use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'image' => ['required']
        ]);

        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $link = UploadImageService::upload($image);
//            $link = cloudinary()->upload($image->getRealPath())->getSecurePath();
        } else {
            $image = $request->get('image');
            $link = UploadImageService::upload($image, true);
//            $link = cloudinary()->upload($image, ['resource_type' => 'image'])->getSecurePath();
        }
        if (!$link) {
            return $this->responseBadRequest();
        }

        return $this->responseData($link);
    }

}
