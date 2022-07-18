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
        return $this->responseFormat($links, 'Links fetched successfully', 200);
    }

    public function link($id)
    {
        $link = Link::with('resource')->find($id);
        if (!$link)
            return $this->responseFormat(null, 'Link not found', 404);
        return $this->responseFormat($link, 'Link fetched successfully', 200);
    }

    public function addLink(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'resource_id' => 'required',
            'url'         => 'required',
        ]);

        if ($validator->fails())
            return $this->responseFormat(null, $validator->errors(), 400);

        $link = new Link;

        if (!$link->where('resource_id', $req->resource_id)->exists())
            return $this->responseFormat(null, 'Resource not found', 404);

        $link = $link->create([
            'resource_id' => $req->resource_id,
            'url'         => $req->url,
        ]);
        return $this->responseFormat($link, 'Link added successfully', 201);
    }

    public function editLink($id, Request $req)
    {
        $validator = Validator::make($req->all(), [
            'url'         => 'required',
        ]);

        if ($validator->fails())
            return $this->responseFormat(null, $validator->errors(), 400);

        $link = Link::find($id);

        if (!$link)
            return $this->responseFormat(null, 'Link not found', 404);

        $link->update([
            'url' => $req->url,
        ]);
        return $this->responseFormat($link, 'Link updated successfully', 200);
    }

    public function deleteLink($id, Request $req)
    {

        $link = Link::find($id);

        if (!$link)
            return $this->responseFormat(null, 'Link not found', 404);

        $link->delete();
        return $this->responseFormat(null, 'Link deleted successfully', 200);
    }
}
