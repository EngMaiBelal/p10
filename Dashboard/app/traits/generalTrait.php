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

    public function returnSuccessMessage($message="",$statusCode=200)
    {
        return response()->json(
            [
                'message'=>$message,
                'errors'=>(object)[],
                'data'=>(object)[]
            ],$statusCode);
    }

    public function returnErrorMessage($message="",$statusCode=400)
    {
        return response()->json(
            [
                'message'=>$message,
                'errors'=>(object)[],
                'data'=>(object)[]
            ],$statusCode);
    }


    public function returnData(object $data,$message="",$statusCode = 200)
    {
        return response()->json(
            [
                'message'=>$message,
                'errors'=>(object)[],
                'data'=>$data
            ],$statusCode);
    }
}
