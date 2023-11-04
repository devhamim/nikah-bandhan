<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class CoverPicMedium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        // return $image->fit(550, 203);
        return $image->fit(276, 184);
    }
}