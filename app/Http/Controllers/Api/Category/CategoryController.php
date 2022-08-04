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

        return $this->responseFormat($categories, 'Categories fetched successfully', 200);
    }

    public function getCategory($id)
    {
        $categories = Category::with('subsections')->withCount('subsections')->find($id);
        if (!$categories)
            return $this->responseFormat([], 'Category not found', 404);

        return $this->responseFormat($categories, 'Category fetched successfully', 200);
    }

    public function addCategory(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name'         => 'required | unique:categories',
        ]);

        if ($validator->fails())
        return $this->responseFormat([], $validator->errors(), 400);

        if ($req->image) {
            $ext = $req->image->extension();
            $name = \Str::random(10) . '.' . $ext;
            $image_path = 'categories/images/';
            $req->image->storeAs('public/' . $image_path, $name);
            $image_path .= $name;
        } else {
            $image_path = null;
        }

        $category = Category::create([
            'name' => $req->name,
            'image' => $image_path,
        ]);

        return $this->responseFormat($category, 'Category added successfully', 201);
    }

    public function editCategory($id , Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name'         => 'required',
        ]);

        if ($validator->fails())
        return $this->responseFormat([], $validator->errors(), 400);

            $category = Category::find($id);
        if (!$category)
            return $this->responseFormat([], 'Category not found', 404);


        if ($category->name == $req->name)
            return $this->responseFormat([], 'The name has already been taken.', 400);

            if ($req->image) {
            $ext = $req->image->extension();
            $name = \Str::random(10) . '.' . $ext;
            $image_path = 'categories/images/';
            $req->image->storeAs('public/' . $image_path, $name);
            $image_path .= $name;
        } else {
            $image_path = null;
        }

        $category->update([
            'name' => $req->name,
            'image' => $image_path,
        ]);

        return $this->responseFormat($category, 'Category updated successfully', 200);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category)
            return $this->responseFormat([], 'Category not found', 404);

        $category->delete();

        return $this->responseFormat([], 'Category deleted successfully', 200);
    }
}
