<?php

namespace App\Http\Controllers\Api\Link;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function getLinks(){

        $links = user_link();
        return response()->json($links);
    }

    public function link($id){
        if(!user_link($id))
            return response()->json(['message' => 'Link not found'], 404);

            $link = Link::with('resource')->find($id);

        return response()->json($link);
    }

    public function addLink(Request $req){
        $validator = Validator::make($req->all(), [
            'resource_id' => 'required',
            'url'         => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['message' => $validator->errors()], 400);
        }

        if(user_link(null , $req->url))
            return response()->json(['message' => 'Link already exists'], 400);

        $link = new Link;

        $link = $link->add([
            'url' => $req->url,
            'resource_id' => $req->resource_id,

        ]);
        return response()->json(['link'=> $link], 201);
    }

    public function editLink(Request $req){
        $validator = Validator::make($req->all(), [
            'id'           => 'required',
            'url'         => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['message' => $validator->errors()], 400);
        }
        if(!user_link($req->id))
            return response()->json(['message' => 'Link not found'], 404);

        $link = Link::find($req->id);
        $link->url = $req->url;
        $link->save();
        return response()->json(['link'=> $link], 201);

            // $link->edit([
            //     'url' => $req->url,
            // ]);

            // return response()->json(['link'=> $link], 201);
    }

}
