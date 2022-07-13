<?php
use App\Models\Category;


function user_category(){
    $category = Category::with('resources')->where('user_id', auth()->id())->get();
    return $category;
}
