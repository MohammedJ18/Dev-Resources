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

    //get categories
    public function getCategories()
    {
        $categories = Category::with('resources')->get();
        return $this->responseFormat($categories, 'success', 200);
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


    // public function editCategory(Request $req)
    // {
    //     $validator = Validator::make($req->all(), [
    //         'id'           => 'required',
    //         'name'         => 'required',
    //     ]);

    //     if ($validator->fails())
    //         return response()->json(['message' => $validator->errors()], 400);

    //     $category = auth()->user()->categories()->find($req->id);
    //     if (!$category)
    //         return response()->json(['message' => 'Category not found'], 404);

    //     if ($category->where('name', $req->name)->exists())
    //         return response()->json(['message' => "Category '$req->name' already exists"], 400);

    //     $category->update([
    //         'name' => $req->name,
    //     ]);

    //     return response()->json(['category' => $category], 200);
    // }

    public function deleteCategory(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id'           => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

        $category = auth()->user()->categories()->find($req->id);

        if (!$category)
            return response()->json(['message' => 'Category not found'], 404);

        $category->delete();

        return response()->json(['message' => 'Category deleted'], 200);
    }
}
