<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categories(){
        $category = user_category();
        return response()->json($category);
    }

    public function category($id){
        if(!user_category($id))
            return response()->json(['message' => 'Category not found'], 404);

            $category = Category::with('resources')->find($id);

        return response()->json($category); // status 200
    }
}
