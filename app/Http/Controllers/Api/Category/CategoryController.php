<?php

namespace App\Http\Controllers\Api\Category;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories(){
        $category = user_category();
        return response()->json($category);
    }

    public function category($id){
        if(!user_category($id))
            return response()->json(['message' => 'Category not found'], 404);

            $category = Category::with('resources')->find($id);

        return response()->json($category);
    }

    public function addCategory(Request $req){
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

    public function editCategory(Request $req){
        $validator = Validator::make($req->all(), [
            'id'           => 'required',
            'name'         => 'required',
        ]);
        
        if ($validator->fails()){
            return response()->json(['message' => $validator->errors()], 400);
        }
        if(!user_category($req->id))
            return response()->json(['message' => 'Category not found'], 404);

        if(user_category(null , $req->name) )
        return response()->json(['message' => "Category '$req->name' already exists"], 400);

        $category = Category::find($req->id);

        $category->edit([
            'name' => $req->name,
        ]);
        
        return response()->json(['category'=> $category], 200);
    }

    public function deleteCategory(Request $req){
        $validator = Validator::make($req->all(), [
            'id'           => 'required',
        ]);
        
        if ($validator->fails()){
            return response()->json(['message' => $validator->errors()], 400);
        }
        if(!user_category($req->id))
            return response()->json(['message' => 'Category not found'], 404);
        
        $category = Category::find($req->id);
        $category->delete();
        
        return response()->json(['message'=> 'Category deleted'], 200);
    }

}
