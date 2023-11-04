<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class LogoMedium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(40, 40);
    }
}