<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class CoverPicXLarge implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(850, 314);
    }
}