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
    public function getResource()
    {
        $resources = Resource::with(['category'])->get();
        return response()->json($resources);

    }

    public function addResource(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'screenShot' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response(['msg' => $validator->errors()->first(), 'status' => 'error']);
        }
        if( $req->screenShot){
            $ext = $req->screenShot->extension();
            $name = \Str::random(10) . '.' . $ext;
            $screenShot_path = 'resources/screenShots/';
            $req->screenShot->storeAs('public/' . $screenShot_path, $name);
            $screenShot_path .= $name;
        }

        $data = [
            'category_id' => $req->category_id,
            'name' => $req->name,
            'description' => $req->description,
            'icon' => $req->icon,
            'screenShot' => $screenShot_path,
        ];

        $insert = Resource::create($data);

        if ($insert) {
            return $this->response(['msg' => 'Resource added successfully', 'status' => 'success']);
        } else {
            return $this->response(['msg' => 'Something went wrong', 'status' => 'error']);
        }
    }

    public function editResource(Request $req)
    {

        $validator = \Validator::make($req->all(), [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'screenShot' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response(['msg' => $validator->errors()->first(), 'status' => 'error']);
        }
        if( $req->screenShot){
            $ext = $req->screenShot->extension();
            $name = \Str::random(10) . '.' . $ext;
            $screenShot_path = 'resources/screenShots/';
            $req->screenShot->storeAs('public/' . $screenShot_path, $name);
            $screenShot_path .= $name;
        }

        $resource = Resource::find($req->id);
        $resource->update([
            'name' => $req->name,
            'category_id' => $req->category_id,
            'description' => $req->description,
            'icon' => $req->icon,
            'screenShot' => $req->screenShot_path,
        ]);

        return $this->response(['msg' => 'Resource updated successfully', 'status' => 'success', $resource]);
    }

    public function deleteResource(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->response(['msg' => $validator->errors()->first(), 'status' => 'error']);
        }

        $resource = Resource::find($req->id);
        $resource->delete();
        return $this->response(['msg' => 'Resource deleted successfully', 'status' => 'success']);
    }
}
