<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait TranslateTrait
{
    public static function translate(string $request_en, string $request_ar, bool $isSlug = false)
    {
        if ($isSlug) {
            return [
                'en' => str_replace(' ', '-', $request_en),
                'ar' => str_replace(' ', '-', $request_ar),
            ];
        }
        return [
            'en' => $request_en,
            'ar' => $request_ar,
        ];
    }
}