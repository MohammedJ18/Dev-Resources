<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HelperTrait;
use App\Models\Resource;

class ResourceController extends Controller
{
    use HelperTrait;
    public function getResource()
    {
        $resources = Resource::with(['category'])->get();
        $data = [
            'msg' => 'Resource',
            'status' => 200,
            'data' => $resources,
        ];
        return $this->response($data);


    }

}
