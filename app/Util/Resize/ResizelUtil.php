<?php

namespace App\Util\Resize;

use Intervention\Image\Facades\Image;

class ResizelUtil
{
    /**
     * @param string $fileName
     * @param $width
     */
    public function make($fileName, $width = 1000)
    {
        $file = Image::make(public_path($fileName))->widen($width, function ($constraint) {
            $constraint->upsize();
        });
        $file->save();

    }
}
