<?php

namespace App\Traits;


trait HelperTrait
{
    public function response($data = null,$msg = null, $status = null)
    {
        $array = [
            'data' => $data,
            'msg' => $msg,
            'status' => $status
        ];
        
        return response()->json($array, $status);
    }
}
