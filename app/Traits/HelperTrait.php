<?php

namespace App\Traits;


trait HelperTrait
{
    public function response($data = [])
    {
        $array = [
            'msg' => $data['msg'],
            'status' => $data['status'],
        ];

        return response()->json($array);
    }
}
