<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HelperTrait
{

    public function responseFormat($data = null, $msg = null, $status = null)
    {
        $response = [
            'data' => $data,
            'msg' => $msg,
            'status' => $status,
        ];
        return response()->json($response, $status);
    }
}
