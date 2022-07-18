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

    //Accessor
    protected function createdTime(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->created_at ? $this->created_at->format('Y-m-d') : null;
            },
        );
    }

    protected function updatedTime(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->updated_at ? $this->updated_at->format('Y-m-d') : null;
            },
        );
    }
}
