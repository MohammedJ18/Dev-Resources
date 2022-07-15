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

    //get categories with resources & subsections count
    public function getCategories()
    {
        $categories = Category::withCount('resources')->withCount('subsections')->get();
        return $this->responseFormat($categories, 'Categories found successfully', 200);
    }

    //get category
    public function getCategory($id)
    {
        $category = Category::with('subsections')->withCount('subsections')->withCount('resources')->find($id);
        if (!$category) {
            return $this->responseFormat([], 'This Category not found', 404);
        }
        return $this->responseFormat($category, 'Category successfully found', 200);
    }

    //add category
    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat([], $validator->errors(), 400);
        }
        $category = Category::create($request->all());
        return $this->responseFormat($category, 'Category added successfully', 201);
    }

    //update category
    public function updateCategory($id, Request $request)
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->responseFormat([], 'This Category not found', 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return $this->responseFormat([], $validator->errors(), 400);
        }
        $category->update($request->all());
        return $this->responseFormat($category, 'Class updated successfully', 200);
    }

    //delete category
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->responseFormat([], 'This Category not found', 404);
        }
        $category->delete();
        return $this->responseFormat([], 'Category deleted successfully', 200);
    }

}
