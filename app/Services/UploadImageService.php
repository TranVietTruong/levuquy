<?php

namespace App\Services;
use GuzzleHttp\Client;

class UploadImageService {
    public static function upload($image, $base64 = false) {
        if (!$base64) {
            $imageBase64 = base64_encode(file_get_contents($image));
        } else {
            $imageBase64 = base64_encode(UploadImageService::decodeBase64Image($image));
        }

        $url = 'https://api.imgur.com/3/image';

        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID'),
            ],
            'form_params' => [
                'image' => $imageBase64,
                'type' => 'base64', // Specify the image is in base64 format
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $responseBody = json_decode($response->getBody(), true);
        return $responseBody['data']['link'];
    }

    public static function decodeBase64Image($base64Image)
    {
        // Check if the base64 string contains 'data:image' prefix
        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
            // Extract the file extension
            $imageType = strtolower($type[1]); // jpg, png, gif, etc.

            // Check if the file extension is valid
            if (!in_array($imageType, ['jpg', 'jpeg', 'png'])) {
                return null; // Invalid file type
            }

            // Remove the data:image/... base64, part of the string
            $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);

            // Decode the base64 string into binary
            $decodedImage = base64_decode($base64Image);

            // Return the decoded image
            return $decodedImage;
        }

        return null;
    }
}
