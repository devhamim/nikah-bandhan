<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class ProductNormalPicLarge implements FilterInterface
{
    public function applyFilter(Image $image)
    {

        // resize the image to a height of 200 and constrain aspect ratio (auto width)
        // return $image->resize(null, 640, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        // $image->contrast(10);
        // $image->sharpen(15);
        return $image;

    }
}
