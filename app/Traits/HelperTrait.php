<?php

namespace App\Traits;


trait HelperTrait
{

    public function responseFormat($data = null, $msg = null, $status = null)
    {
        $response = [
            'data' => $data,
            'msg' => $msg,
            'status' => $status,
        ];
        return $response;
    }
}
