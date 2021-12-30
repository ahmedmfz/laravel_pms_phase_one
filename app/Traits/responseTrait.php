<?php

namespace App\Traits;



trait responseTrait
{
    public function data($data,$message,$status){ 
        $response = [
            'data' => $data,
            'message'=>$message,
            'status' =>$status,
        ];
        return response($response);
    }
}
