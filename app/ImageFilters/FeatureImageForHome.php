<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class FeatureImageForHome implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        // return $image->fit(810, 300);
        $image->fit(360, 240);
        // $watermark = Image::make(public_path('/img/tmm5.png'));
        // return $image->insert($watermark);
        return  $image->insert('img/tmm5.png');
 
       // return $image->insert('img/w1.png', 'bottom');
    }
}