<?php

namespace App\Http\Controllers\Api\Category;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HelperTrait;
use App\Models\Category;

class CategoryController extends Controller
{

    use HelperTrait;

    public function getCategories()
    {
        $categories = Category::withCount('resources')->withCount('subsections')->get();
        
        return $this->responseFormat( $categories, 'Categories have been found successfully', 200);
    }

    public function getCategory($id)
    {
        $categories = Category::with('subsections')->withCount('subsections')->find($id);
        if (!$categories)
            return $this->responseFormat([], 'Category not found', 404);

        return $this->responseFormat( $categories, 'Categories have been found successfully', 200);
    }

    public function addCategory(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name'         => 'required | unique:categories',
            'image'        => 'required',
        ]);

        if ($validator->fails())
            return $this->responseFormat([], $validator->errors(), 400);

        $ext = $req->image->extension();
        $name = \Str::random(10) . '.' . $ext;
        $image_path = 'resources/image/';
        $req->image->storeAs('public/' . $image_path, $name);
        $image_path .= $name;

        $category = Category::create([
            'name' => $req->name,
            'image' => $image_path,
        ]);

        return $this->responseFormat($category, 'Category has been added successfully', 200);
    }

    public function editCategory($id , Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name'         => 'required | unique:categories',
            'image'        => 'required',
        ]);

        if ($validator->fails())
            return $this->responseFormat([], $validator->errors(), 400);

            $category = Category::find($id);
        if (!$category)
            return $this->responseFormat([], 'Category not found', 404);

            if ($req->image) {
                $ext = $req->image->extension();
                $name = \Str::random(10) . '.' . $ext;
                $image_path = 'resources/image/';
                $req->image->storeAs('public/' . $image_path, $name);
                $image_path .= $name;
            }

        $category->update([
            'name' => $req->name,
            'image' => $image_path,
        ]);

        return $this->responseFormat($category, 'Category has been updated successfully', 200);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category)
            return $this->responseFormat([], 'Category not found', 404);

        $category->delete();

        return $this->responseFormat([], 'Category has been deleted successfully', 200);
    }
}
