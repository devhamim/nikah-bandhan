<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class CoverPicSmall implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        // return $image->fit(406, 150);
        return $image->fit(200, 84); // 600 /400
    }
}