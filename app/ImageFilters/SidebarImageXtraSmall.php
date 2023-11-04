<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class SidebarImageXtraSmall implements FilterInterface
{
    public function applyFilter(Image $image)
    {

        // resize the image to a width of 200 and constrain aspect ratio (auto height)
        // return $image->resize(80, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });



        // resize image to fixed size
		// return $image->resize(60, 40);  // 600 / 400
		return $image->fit(60, 40);


    }
}