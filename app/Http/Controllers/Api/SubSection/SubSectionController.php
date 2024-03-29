<?php

namespace App\Http\Controllers\Api\SubSection;

use App\Http\Controllers\Controller;
use App\Models\SubSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\HelperTrait;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SubSectionController extends Controller
{
    use HelperTrait;
    use WithFileUploads;
    //add sub section method
    public function addSubSection(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required | unique:sub_sections',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat([], $validator->errors(), 400);
        }

        $subSection = new SubSection();

        if ($req->image) {
            $ext = $req->image->extension();
            $name = \Str::random(10) . '.' . $ext;
            $image_path = 'resources/images/';
            $req->image->storeAs('public/' . $image_path, $name);
            $image_path .= $name;
        } else {
            $image_path = null;
        }

        $subSection->name = $req->name;
        $subSection->category_id = $req->category_id;
        $subSection->image = $image_path;
        $subSection->save();
        return $this->responseFormat($subSection, 'Sub Section has been added successfully', 200);
    }

    //update sub section method
    public function updateSubSection($id, Request $req)
    {
        $subSection = SubSection::find($id);
        if (!$subSection) {
            return $this->responseFormat([], 'This Sub Section not found', 404);
        }
        $validator = Validator::make($req->all(), [
            'name' => 'required | unique:sub_sections',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat([], $validator->errors(), 400);
        }
        $subSection->name = $req->name;
        $subSection->category_id = $req->category_id;
        $subSection->save();
        return $this->responseFormat($subSection, 'Sub Section has been updated successfully', 200);
    }

    //delete sub section method
    public function deleteSubSection($id)
    {
        $subSection = SubSection::find($id);
        if (!$subSection) {
            return $this->responseFormat([], 'This Sub Section not found', 404);
        }
        $subSection->delete();
        return $this->responseFormat([], 'Sub Section has been deleted successfully', 200);
    }

    //get sub section by id with resources method
    public function getSubSectionById($id)
    {
        $subSection = SubSection::with('resources')->find($id);
        if (!$subSection) {
            return $this->responseFormat([], 'This Sub Section not found', 404);
        }
        return $this->responseFormat($subSection, 'Sub Section found successfully', 200);
    }

    // get subsections bg category_id method
    public function getSubSectionsByCategoryId($category_id)
    {
        $subSections = SubSection::where('category_id', $category_id)->withCount('resources')->get();
        if (!$subSections) {
            return $this->responseFormat([], 'Sub Sections not found', 404);
        }
        return $this->responseFormat($subSections, 'Sub Sections found successfully', 200);
    }
}
