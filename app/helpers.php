<?php
use App\Models\Category;
function user_category($user_id)
{
    $category = Category::where('user_id', $user_id)->exists()->get();
    return $category;
}
