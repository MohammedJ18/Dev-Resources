<?php

namespace App\Http\Controllers\Api\Category;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller
{
    //get categories
    public function getCategories()
    {
        $categories = Category::with('resources')->get();
        return response()->json($categories);
    }

    //get category
    public function getcategory($id)
    {
        $category = Category::with('resources')->find($id);
        if (!$category)
            return response()->json(['message' => 'Category not found'], 404);
        return response()->json($category);
    }

    //get admin categories
    public function getAdminCategories($id)
    {
        $user = User::find($id);
        if(!$user)
            return response()->json(['message' => 'User not found'], 404);
        if(!$user->categories()->exists())
            return response()->json(['message' => 'User dont have category'], 404);
        $categories = Category::where('user_id', $id)->get();

        return response()->json($categories);
    }


    public function addCategory(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name'         => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

        $category = new Category;

        if ($category->where('name', $req->name)->exists())
            return response()->json(['message' => 'category is  already taken'], 400);

        $user_id = auth()->id();
        $category = $category->create([
            'name' => $req->name,
            'user_id' => $user_id,
        ]);

        return response()->json(['category' => $category], 201);
    }

    public function editCategory(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id'           => 'required',
            'name'         => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

            $category = Category::find($req->id);
        if (!$category)
            return response()->json(['message' => 'Category not found'], 404);

        if ($category->where('name', $req->name)->exists())
            return response()->json(['message' => "Category '$req->name' already exists"], 400);

        $category->update([
            'name' => $req->name,
        ]);

        return response()->json(['category' => $category], 200);
    }

    public function deleteCategory(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id'           => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 400);

        $category = Category::find($req->id);

        if (!$category)
            return response()->json(['message' => 'Category not found'], 404);

        $category->delete();

        return response()->json(['message' => 'Category deleted'], 200);
    }
}
