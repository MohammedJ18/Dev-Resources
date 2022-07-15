<?php

namespace App\Traits;


trait HelperTrait
{
    public function responseFormat($data = null, $msg = null, $status = null)
    {
        $array = [
            'data' => $data,
            'message' => $msg,
            'status' => $status,
        ];

        return response()->json($array);
    }
}
