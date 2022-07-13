<?php

namespace App\Http\Controllers\Api\Resource;

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
        return response()->json($resources);

    }
}
