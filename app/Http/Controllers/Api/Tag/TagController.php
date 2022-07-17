<?php

namespace App\Http\Controllers\Api\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HelperTrait;
use App\Models\Tag;

class TagController extends Controller
{
    use HelperTrait;

    public function getTags ()
    {
        $tags = Tag::get();
        return $this->responseFormat($tags, 'Tags have been found successfully', 200);
    }

}
