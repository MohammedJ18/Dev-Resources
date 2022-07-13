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

    public static function add($data) {
        $model = new self;
        $model->fill($data);
        $model->save();
        return $model;
    }
}
