<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\CoupleInformation;
use App\Models\User;
use App\Models\WebsiteInformation;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Image\Drivers\ImageDriver;
use Spatie\Image\Image;

class AlbumController extends Controller
{
    public function index(Request $request) {
        $data = Album::where('user_id', Auth::user()->id)->orderBy('order')->orderBy('id', 'desc')->get();
        if (!count($data)) {
            $data = [
                [
                    'small' => 'https://i.imgur.com/4de2gue.jpg',
                    'large' => 'https://i.imgur.com/4de2gue.jpg',
                    'title' => '',
                    'order' => 1,
                    'check' => false
                ]
            ];
        } else {
            foreach ($data as $value) {
                $value->check = false;
            }
            $data = $data->toArray();
        }
        return $this->responseData($data);
    }

    public function store(Request $request) {
//        try {
            $file = $request->file('image');

//            $imageLarge = Image::useImageDriver('gd')->load($file->getRealPath())->width(1000)->optimize()->base64('jpg');
//            $imageSmall = Image::useImageDriver('gd')->load($file->getRealPath())->width(500)->optimize()->base64('jpg');

//            $large = UploadImageService::upload($imageLarge, true);
//            $small = UploadImageService::upload($imageSmall, true);

//            $large = cloudinary()->upload($imageLarge, ['resource_type' => 'image'])->getSecurePath();
//            $small = cloudinary()->upload($imageSmall, ['resource_type' => 'image'])->getSecurePath();



            $large = Str::random(10).'.jpg';
            $small = Str::random(10).'.jpg';

            Storage::disk('public')->put($large, file_get_contents($file));
            Storage::disk('public')->put($small, file_get_contents($file));

            $largePath = storage_path('app/public/').$large;
            $pathPath = storage_path('app/public/').$small;

            Image::useImageDriver('gd')->load($largePath)->width(1000)->optimize()->save();
            Image::useImageDriver('gd')->load($pathPath)->width(500)->optimize()->save();

            $linkLarge = config('app.url').'storage/'.$large;
            $linkSmall = config('app.url').'storage/'.$small;

            $album = new Album();
            $album->small = $linkLarge;
            $album->large = $linkSmall;
            $album->user_id = Auth::user()->id;
            $album->save();

            return $this->responseData($album);
//        } catch (\Exception $exception) {
//            Log::error($exception->getMessage());
//            return $this->responseErrors();
//        }
    }

    public function update(Request $request) {
        $id = $request->get('id');
        $title = $request->get('title');
        $order = $request->get('order');

        $album = Album::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$album) {
            return $this->responseNotFound();
        }

        $album->title = $title;
        $album->order = $order;
        $album->save();
        return $this->responseSuccess();
    }

    public function delete(Request $request) {
        $ids = $request->get('ids');
        Album::whereIn('id', $ids)->where('user_id', Auth::user()->id)->delete();
        return $this->responseSuccess();
    }
}
