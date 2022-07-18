<?php

namespace App\Http\Controllers\Api\Link;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    use HelperTrait;
    public function getLinks()
    {
        $links = Link::with('resource')->get();
        return response()->json($links);
    }

    public function link($id)
    {
        $link = Link::with('resource')->find($id);
        if (!$link)
            return response()->json([], 404);
        return response()->json($link);
    }

    public function addLink(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'resource_id' => 'required',
            'url'         => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

        $link = new Link;

        if (!$link->where('resource_id', $req->resource_id)->exists())
            return response()->json(['message' => 'Resource not found'], 404);

        $link = $link->create([
            'resource_id' => $req->resource_id,
            'url'         => $req->url,
        ]);
        return response()->json($link);
    }

    public function editLink($id, Request $req)
    {
        $validator = Validator::make($req->all(), [
            'url'         => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

        $link = Link::find($id);

        if (!$link)
            return response()->json(['message' => 'Link not found'], 404);

        $link->update([
            'url' => $req->url,
        ]);
        return response()->json(['message' => 'Link has been updated successfully'], 200);
    }

    public function deleteLink($id, Request $req)
    {

        $link = Link::find($id);

        if (!$link)
            return response()->json(['message' => 'Link not found'], 404);

        $link->delete();
        return response()->json(['message' => 'Link has been deleted successfully'], 200);
    }
}
