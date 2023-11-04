<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class CoursePicSmall implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        // return $image->fit(406, 150);
        return $image->fit(200, 125); // 600 /400
    }
}