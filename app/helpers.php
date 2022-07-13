<?php
use App\Models\Category;


function user_category($id = null , $name = null){
    if($id)
        $category = Category::where('user_id', $id)->exists();
    else if($name)
        $category = Category::where('name', $name)->exists();
    else 
        $category = Category::with('resources')->where('user_id', auth()->id())->get();

    return $category;
}
