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

    //get resources count
    public function getResourcesCount()
    {
        $resources = Resource::count();
        return response()->json($resources);
    }
    //get resources with tags and links
    public function getAllResources()
    {
        $resources = Resource::with('tags', 'links')->get();
        return response()->json($resources);
    }


    //get resources by subsection_id
    public function getResourcesBySubsectionId($subsection_id)
    {
        $resources = Resource::where('sub_section_id', $subsection_id)->with('tags')->get();
        return response()->json($resources);
    }

    //get resource by id
    public function getResourceById(Request $request)
    {
        $resource = Resource::with('tags', 'links')->find($request->id);
        return response()->json($resource);
    }

    //The last six resources
    public function getLastSixResources()
    {
        $resources = Resource::orderBy('id', 'desc')->take(6)->with('category')->with('subsection')->get();
        return response()->json($resources);
    }

    //add resource
    public function addResource(Request $req)
    {
        
        $validator = Validator::make($req->all(), [
            'category_id' => 'required|exists:categories,id',
            'sub_section_id' => 'required|exists:sub_sections,id',
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }
        if ($req->image) {
            $ext = $req->image->extension();
            $name = \Str::random(10) . '.' . $ext;
            $image_path = 'resources/images/';
            $req->image->storeAs('public/' . $image_path, $name);
            $image_path .= $name;
        } else {
            $image_path = null;
        }
        //
        $data = [
            'category_id' => $req->category_id,
            'sub_section_id' => $req->sub_section_id,
            'name' => $req->name,
            'description' => $req->description,
            'image' => $image_path,
            'state' => false,
        ];


        $insert = Resource::create($data);
        $tags = array_values($req->tags);
        $insert->tags()->attach($tags);

        if ($insert) {
            return response()->json($insert, 200);
        } else {
            return response()->json(['message' => 'Resource has not been added successfully'], 400);
        }
    }

    //edit resource
    public function updateResource($id, Request $req)
    {

        $validator = Validator::make($req->all(), [
            'category_id' => 'required|exists:categories,id',
            'sub_section_id' => 'required|exists:sub_sections,id',
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        if ($req->image) {
            $ext = $req->image->extension();
            $name = \Str::random(10) . '.' . $ext;
            $image_path = 'resources/images/';
            $req->image->storeAs('public/' . $image_path, $name);
            $image_path .= $name;
        } else {
            $image_path = null;
        }

        $resource = Resource::find($id);
        if (!$resource)
            return response()->json(['message' => 'Resource not found'], 404);

        $resource->update([
            'name' => $req->name,
            'category_id' => $req->category_id,
            'sub_section_id' => $req->sub_section_id,
            'description' => $req->description,
            'image' => $image_path,
        ]);

        $tags = array_values($req->tags);
        $resource->tags()->sync($tags);

        return response()->json(['message' => 'Resource has been updated successfully'], 200);
    }

    //delete resource
    public function deleteResource(Request $req)
    {
        $resource = Resource::find($req->id);

        $resource->tags()->detach($req->tags);

        if (!$resource)
            return response()->json(['message' => 'Resource not found'], 404);
        $resource->delete();
        return response()->json(['message' => 'Resource has been deleted successfully'], 200);
    }

    //Accept Resource
    public function acceptResource($id)
    {
        $resource = Resource::find($id);
        if (!$resource)
            return response()->json(['message' => 'Resource not found'], 404);

        if ($resource->state == true) {
            return response()->json(['message' => 'Resource is already accepted'], 400);
        }
        $resource->update(['state' => true]);
        return response()->json(['message' => 'Resource has been accepted successfully'], 200);
    }
}
