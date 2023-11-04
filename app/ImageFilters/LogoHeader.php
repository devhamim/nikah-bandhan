<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class LogoHeader implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        // return $image->fit(810, 300);
        return $image->fit(175, 88);
    }
}