<?php

namespace App\Http\Controllers\Api\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HelperTrait;
use App\Models\Resource;
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
        return responseFormat(['resources' => $resources], "success", 200);
    }
    //Category Resources
    public function getCategoryResources($id)
    {
        $resources = Resource::where('category_id', $id)->get();
        return responseFormat(['resources' => $resources], "success", 200);
    }
    //The last six resources method
    public function getLastSixResources()
    {
        $resources = Resource::orderBy('id', 'desc')->take(6)->get();
        return responseFormat(['resources' => $resources], "success", 200);
    }

    
    //add resource
    public function addResource(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'category_id' => 'required|exists:categories,id',
            'subsection_id' => 'required|exists:sub_sections,id',
            'name' => 'required',
            'description' => 'required',
            'screenShot' => 'required',
        ]);
        if ($validator->fails()) {
            return responseFormat()->error($validator->errors()->first());
        }
        if ($req->screenShot) {
            $ext = $req->screenShot->extension();
            $name = \Str::random(10) . '.' . $ext;
            $screenShot_path = 'resources/screenShots/';
            $req->screenShot->storeAs('public/' . $screenShot_path, $name);
            $screenShot_path .= $name;
        }

        $data = [
            'category_id' => $req->category_id,
            'subsection_id' => $req->subsection_id,
            'name' => $req->name,
            'description' => $req->description,
            'screenShot' => $screenShot_path,
            'state' => false,
        ];

        $insert = auth()->user()->resources()->create($data);

        if ($insert) {
            return $this->responseFormat(['msg' => 'Resource added successfully', 'status' => 'success', 'data' => $insert]);
        } else {
            return $this->responseFormat(['msg' => 'Something went wrong', 'status' => 'error']);
        }
    }
    //edit resource
    public function editResource(Request $req)
    {

        $validator = \Validator::make($req->all(), [
            'category_id' => 'required|exists:categories,id',
            'subsection_id' => 'required|exists:sub_sections,id',
            'name' => 'required',
            'description' => 'required',
            'screenShot' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat(['msg' => $validator->errors()->first(), 'status' => 'error']);
        }

        if ($req->screenShot) {
            $ext = $req->screenShot->extension();
            $name = \Str::random(10) . '.' . $ext;
            $screenShot_path = 'resources/screenShots/';
            $req->screenShot->storeAs('public/' . $screenShot_path, $name);
            $screenShot_path .= $name;
        }

        $resource = auth()->user()->resources()->find($req->id);
        if (!$resource)
            return $this->responseFormat(['msg' => 'Something went wrong',  'status' => 'error']);

        $resource->update([
            'name' => $req->name,
            'category_id' => $req->category_id,
            'subsection_id' => $req->subsection_id,
            'description' => $req->description,
            'screenShot' => $screenShot_path,
        ]);

        return $this->responseFormat(['msg' => 'Resource updated successfully', 'status' => 'success', 'data' => $resource]);
    }
    //delete resource
    public function deleteResource(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseFormat(['msg' => $validator->errors()->first(), 'status' => 'error']);
        }

        $resource = auth()->user()->resources()->find($req->id);

        if ($resource) {
            $resource->delete();
            return $this->responseFormat(['msg' => 'Resource deleted successfully', 'status' => 'success']);
        } else return $this->responseFormat(['msg' => 'Resource deleted field', 'status' => 'error']);
    }
    //Accept Resource
    public function acceptResource(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseFormat(['msg' => $validator->errors()->first(), 'status' => 'error']);
        }

        $resource = auth()->user()->resources()->find($req->id);

        if ($resource) {
            $resource->update([
                'state' => true,
            ]);
            return $this->responseFormat(['msg' => 'Resource accepted successfully', 'status' => 'success', 'data' => $resource]);
        } else return $this->responseFormat(['msg' => 'Resource accepted field', 'status' => 'error']);
    }
    // Reject Resource
    public function rejectResource(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseFormat(['msg' => $validator->errors()->first(), 'status' => 'error']);
        }

        $resource = auth()->user()->resources()->find($req->id);

        if ($resource) {
            $resource->update([
                'state' => false,
            ]);
            return $this->responseFormat(['msg' => 'Resource rejected successfully', 'status' => 'success', 'data' => $resource]);
        } else return $this->responseFormat(['msg' => 'Resource rejected field', 'status' => 'error']);
    }
}
