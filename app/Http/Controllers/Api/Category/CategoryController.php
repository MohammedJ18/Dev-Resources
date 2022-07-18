<?php

namespace App\Http\Controllers\Api\Category;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\HelperTrait;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    use HelperTrait;
    use WithFileUploads;
    public function getCategories()
    {
        $categories = Category::withCount('resources')->withCount('subsections')->get();

        return response()->json($categories);
    }

    public function getCategory($id)
    {
        $categories = Category::with('subsections')->withCount('subsections')->find($id);
        if (!$categories)
            return response()->json(['message' => 'Category not found'], 404);

        return response()->json($categories);
    }

    public function addCategory(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name'         => 'required | unique:categories',
        ]);

        if ($validator->fails())
        return response()->json(['message' => $validator->errors()], 400);

        if($req->image) {
        $ext = $req->image->extension();
        $name = \Str::random(10) . '.' . $ext;
        $image_path = 'resources/image/';
        $req->image->storeAs('public/' . $image_path, $name);
        $image_path .= $name;
        }
        else {
            $image_path = null;
        }
        $category = Category::create([
            'name' => $req->name,
            'image' => $image_path,
        ]);

        return response()->json(['Category' => $category] , 200);
    }

    public function editCategory($id , Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name'         => 'required | unique:categories',
        ]);

        if ($validator->fails())
        return response()->json(['message' => $validator->errors()], 400);

            $category = Category::find($id);
        if (!$category)
            return response()->json(['message' => 'Category not found'], 404);

            if ($req->image) {
                $ext = $req->image->extension();
                $name = \Str::random(10) . '.' . $ext;
                $image_path = 'resources/image/';
                $req->image->storeAs('public/' . $image_path, $name);
                $image_path .= $name;
            } else {
                $image_path = null;
            }

        $category->update([
            'name' => $req->name,
            'image' => $image_path,
        ]);

        return response()->json(['Message' => 'Category updated successfully'], 200);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category)
            return response()->json(['message' => 'Category not found'], 404);

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
