<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class SidebarImageSmall implements FilterInterface
{
    public function applyFilter(Image $image)
    {

        // resize the image to a width of 200 and constrain aspect ratio (auto height)
        return $image->resize(160, null, function ($constraint) {
            $constraint->aspectRatio();
        });

    }
}