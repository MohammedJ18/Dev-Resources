<?php

namespace App\Http\Controllers\Api\Category;

use Illuminate\Support\Facades\Validator;
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

        return response()->json($category);
    }

    public function add(Request $req){
        $validator = Validator::make($req->all(), [
            'name'         => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['message' => $validator->errors()], 400);
        }

        if(user_category(null , $req->name))
            return response()->json(['message' => 'Category already exists'], 400);
        
        $category = new Category;

        $user_id = auth()->id();
        $category = $category->add([
            'name' => $req->name,
            'user_id' => $user_id,
        ]);
    
    
        return response()->json(['category'=> $category], 201);
    }
}
