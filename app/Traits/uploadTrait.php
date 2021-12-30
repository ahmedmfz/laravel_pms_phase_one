<?php

namespace App\Traits;

use Illuminate\Support\ServiceProvider;

trait uploadTrait
{
    function saveImage($photo,$folder){
        $file_extention = $photo->getClientOriginalExtension();
        $file_name = time().'.'.$file_extention;
        $path = 'assets/images/'.$folder;
        $photo->move($path,$file_name);
        
        return $file_name;
    }
}
