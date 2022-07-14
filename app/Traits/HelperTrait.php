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

    public static function add($data) {
        $model = new self;
        $model->fill($data);
        $model->save();
        return $model;
    }

    // update the model

    public function edit($data) {
        $this->fill($data);
        $this->save();
    }
}
