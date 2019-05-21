<?php
/**
 * Created by PhpStorm.
 * User: Ada
 * Date: 5/19/2019
 * Time: 6:45 PM
 */

namespace App\helper;


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