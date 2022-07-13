<?php

namespace App\Traits;


trait HelperTrait
{
    public function response($data = [])
    {
        $array = [
            'msg' => $data['msg'],
            'status' => $data['status'],
            'data' => $data['data']
        ];

        return response()->json($array);
    }
}
