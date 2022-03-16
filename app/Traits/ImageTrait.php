<?php

namespace App\Traits;

Trait ImageTrait
{
    protected function saveImage($photo,$folder)
    {
        $file_extension =  $photo->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = $folder;
        $photo->move($path, $file_name);
        return $file_name;
    }

}
