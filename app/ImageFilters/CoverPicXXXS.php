<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class CoverPicXXXS implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(128, 32);
    }
}