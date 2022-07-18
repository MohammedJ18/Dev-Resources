<?php

namespace App\Http\Controllers\Api\Tag;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HelperTrait;
use App\Models\Tag;

class TagController extends Controller
{
    use HelperTrait;

    public function getTags()
    {
        $tags = Tag::get();
        return $this->responseFormat($tags, 'Tags fetched successfully', 200);
    }

    public function getTag($id)
    {
        $tag = Tag::find($id);
        if (!$tag)
            return $this->responseFormat([], 'Tag not found', 404);

        return $this->responseFormat($tag, 'Tag fetched successfully', 200);
    }

    public function addTag(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required | unique:tags',
        ]);

        if ($validator->fails())
            return $this->responseFormat([], $validator->errors(), 400);

        $tag = Tag::create([
            'name' => $req->name,
        ]);

        return $this->responseFormat($tag, 'Tag added successfully', 201);
    }

}
