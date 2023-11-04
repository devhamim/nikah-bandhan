<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class ProductNormalPicSmall implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        // resize the image to a height of 200 and constrain aspect ratio (auto width)
        return $image->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
}

