<?php

namespace App\Http\Controllers;

use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

            $filePath = Str::random(10).'.jpg';
            Storage::disk('public')->put($filePath, $image);

//            $link = UploadImageService::upload($image);
//            $link = cloudinary()->upload($image->getRealPath())->getSecurePath();
        } else {
            $image = $request->get('image');
            $filePath = $this->saveBase64Image($image);

//            $link = UploadImageService::upload($image, true);
//            $link = cloudinary()->upload($image, ['resource_type' => 'image'])->getSecurePath();
        }
        if (!$filePath) {
            return $this->responseBadRequest();
        }
        $link = config('app.url').'storage/'.$filePath;

        return $this->responseData($link);
    }

    public function saveBase64Image($base64Image) {
        list($type, $base64Data) = explode(';', $base64Image);
        list(, $base64Data)      = explode(',', $base64Data);

        $binaryData = base64_decode($base64Data);

        $filePath = Str::random(10).'.jpg';

        Storage::disk('public')->put($filePath, $binaryData);

        return $filePath;
    }

}
