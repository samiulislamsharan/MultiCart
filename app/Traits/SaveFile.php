<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Save File Trait
|--------------------------------------------------------------------------
|
| This trait will be used for saving files.
|
*/

trait SaveFile
{
    /**
     * Save image file.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string|null  $previousImage
     * @param  string|null  $path
     * @return string
     */
    protected function saveImage($file, $previousImage = null, $path = null)
    {
        if ($previousImage != null) {
            $image_path = $previousImage;

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        if ($path == null) {
            $image_name = time() . '.' . $file->extension();

            $file->move(public_path('images/'), $image_name);
        } else {
            $image_name = '' . $path . '/' . time() . '.' . $file->extension();
            $file->move(public_path($path), $image_name);
        }

        return $image_name;
    }
}