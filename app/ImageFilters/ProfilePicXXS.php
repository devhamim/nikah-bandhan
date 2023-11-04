<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class ProfilePicXXS implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(20, 20);
    }
}