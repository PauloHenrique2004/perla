<?php

namespace App\Util\Thumbnail;

use Intervention\Image\Facades\Image;

class ThumbnailUtil
{
    /**
     * @param string $fileName
     * @param string $storageName
     * @return string
     */
    public function make($fileName, $storageName)
    {
        $file = Image::make(public_path($fileName))->resize(300, 300, function ($constraint) {
            $constraint->upsize();
        });

        $thumbnail = "thumb-{$file->filename}.{$file->extension}";
        $thumbnailPath = "{$file->dirname}/{$thumbnail}";

        $file->save($thumbnailPath);

        return "$storageName/$thumbnail";
    }
}
