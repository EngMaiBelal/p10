<?php

namespace App\traits;

trait generalTrait {
    public function uploadPhoto($image,$folder)
    {
        // upload photo
        $photoName = time(). '.' . $image->extension();
        // relative , abs
        $image->move(public_path("images\\".$folder),$photoName);

        return $photoName;
    }
}
