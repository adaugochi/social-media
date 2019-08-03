<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class FileUpload
{
    /**
     * @param $name
     * @param $folder
     * @return
     */
    public static function saveImage($name, $folder)
    {
        $path = request($name)->store($folder, 'public');
        $image = Image::make(public_path("storage/{$path}"))->fit(1000, 1000);
        $image->save();
        return $path;
    }
}