<?php

namespace App\Http\Controllers\Api\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HelperTrait;
use App\Models\Resource;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class ResourceController extends Controller
{
    use WithFileUploads;
    use HelperTrait;

    //get resources count method
    public function getResourcesCount()
    {
        $resources = Resource::count();
        return $this->responseFormat($resources, 'Resources Count', 200);
    }

    //The last six resources method
    public function getLastSixResources()
    {
        $resources = Resource::orderBy('id', 'desc')->take(6)->with('category')->with('subsection')->get();
        return $this->responseFormat($resources, 'Resources have been found successfully', 200);
    }

    //add resource
    public function addResource(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'category_id' => 'required|exists:categories,id',
            'subsection_id' => 'required|exists:sub_sections,id',
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat([], $validator->errors(), 400);
        }
        if($req->screenShot){
        $ext = $req->screenShot->extension();
        $name = \Str::random(10) . '.' . $ext;
        $screenShot_path = 'resources/screenShots/';
        $req->screenShot->storeAs('public/' . $screenShot_path, $name);
        $screenShot_path .= $name;
    }else {
        $screenShot_path = null;
    }

        $data = [
            'category_id' => $req->category_id,
            'subsection_id' => $req->subsection_id,
            'name' => $req->name,
            'description' => $req->description,
            'screenShot' => $screenShot_path,
            'state' => false,
        ];


        $insert = Resource::create($data);

        $tags = array_values($req->tags);
        $insert->tags()->attach($tags);

        if ($insert) {
            return $this->responseFormat($insert, 'Resource Added Successfully', 200);
        } else {
            return $this->responseFormat([], 'Resource Not Added', 400);
        }
    }

    //edit resource
    public function updateResource($id, Request $req)
    {

        $validator = Validator::make($req->all(), [
            'category_id' => 'required|exists:categories,id',
            'subsection_id' => 'required|exists:sub_sections,id',
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat([], $validator->errors(), 400);
        }

        if ($req->screenShot) {
            $ext = $req->screenShot->extension();
            $name = \Str::random(10) . '.' . $ext;
            $screenShot_path = 'resources/screenShots/';
            $req->screenShot->storeAs('public/' . $screenShot_path, $name);
            $screenShot_path .= $name;
        }
        else {
            $screenShot_path = null;
        }

        $resource = Resource::find($id);
        if (!$resource)
            return $this->responseFormat([], 'Resource Not Found', 404);

        $resource->update([
            'name' => $req->name,
            'category_id' => $req->category_id,
            'subsection_id' => $req->subsection_id,
            'description' => $req->description,
            'screenShot' => $screenShot_path,
        ]);

        $tags = array_values($req->tags);
        $resource->tags()->sync($tags);

        return $this->responseFormat($resource, 'Resource Updated Successfully', 200);
    }

    //delete resource
    public function deleteResource(Request $req)
    {
        $resource = Resource::find($req->id);

        $resource->tags()->detach($req->tags);

        if (!$resource)
            return $this->responseFormat([], 'Resource Not Found', 404);
        $resource->delete();
        return $this->responseFormat([], 'Resource Deleted Successfully', 200);
    }

    //Accept Resource
    public function acceptResource($id)
    {
        $resource = Resource::find($id);
        if (!$resource)
            return $this->responseFormat([], 'Resource Not Found', 404);

        if ($resource->state == true) {
            return $this->responseFormat([], 'Resource Already Accepted', 400);
        }
        $resource->update(['state' => true]);
        return $this->responseFormat($resource, 'Resource Accepted Successfully', 200);
    }
}
