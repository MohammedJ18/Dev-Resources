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
        return response()->json($tags);
    }

    public function getTag($id)
    {
        $tag = Tag::find($id);
        if (!$tag)
            return response()->json(['message' => 'Tag not found'], 404);

        return response()->json($tag);
    }

    public function addTag(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required | unique:tags',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

        $tag = Tag::create([
            'name' => $req->name,
        ]);

        return response()->json(['Tag' => $tag] , 200);
    }

}
