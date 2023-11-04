<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class CoverPicXXLarge implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(1600, 400);
    }
}