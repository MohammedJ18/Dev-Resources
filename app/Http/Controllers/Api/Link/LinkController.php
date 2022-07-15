<?php

namespace App\Http\Controllers\Api\Link;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function getLinks()
    {
        $links = Link::with('resource')->get();
        return response()->json($links);
    }

    public function link($id)
    {
        $link = Link::with('resource')->find($id);
        if (!$link)
            return response()->json(['message' => 'Link not found'], 404);

        return response()->json($link);
    }

    public function addLink(Request $req){
        $validator = Validator::make($req->all(), [
            'resource_id' => 'required',
            'url'         => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

            $link = new Link;

        if (!$link->where('resource_id', $req->resource_id)->exists())
            return response()->json(['message' => 'Resource not found'], 404);

        // if($link->where('url', $req->url)->exists())
        //     return response()->json(['message' => 'Link already exists'], 400);

        $link = $link->create([
            'resource_id' => $req->resource_id,
            'url'         => $req->url,
        ]);

        return response()->json(['link'=> $link], 201);
    }

    public function editLink(Request $req){
        $validator = Validator::make($req->all(), [
            'id'           => 'required',
            'url'         => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

            $link = Link::find($req->id);

        if(!$link)
            return response()->json(['message' => 'Link not found'], 404);

            $link->update([
                'url' => $req->url,
            ]);

            return response()->json(['link'=> $link], 201);
    }

    public function deleteLink(Request $req){
        $validator = Validator::make($req->all(), [
            'id'           => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

            $link = Link::find($req->id);
        if(!$link)
            return response()->json(['message' => 'Link not found'], 404);


        $link->delete();
        return response()->json(['message'=> 'Link deleted'], 200);
    }

}
