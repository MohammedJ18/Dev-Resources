<?php

namespace App\Http\Controllers\Api\Category;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Traits\HelperTrait;

class CategoryController extends Controller
{
    use HelperTrait;

    //get categories with resources count with subsections count
    public function getCategories()
    {
        $categories = Category::with('resourcesCount', 'subsectionsCount')->get();
        return response()->json($categories);
    }

    //get category
    public function getCategory($id)
    {
        $category = Category::with('resources')->find($id);
        if (!$category) {
            return $this->responseFormat([], 'error', 404);
        }
        return $this->responseFormat($category, 'success', 200);
    }

    //add category
    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat([], $validator->errors(), 400);
        }
        $category = Category::create($request->all());
        return $this->responseFormat($category, 'success', 201);
    }

    //update category
    public function updateCategory($id, Request $request)
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->responseFormat([], 'error', 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat([], $validator->errors(), 400);
        }
        $category->update($request->all());
        return $this->responseFormat($category, 'success', 200);
    }

    //delete category
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->responseFormat([], 'error', 404);
        }
        $category->delete();
        return $this->responseFormat([], 'success', 200);
    }

}
