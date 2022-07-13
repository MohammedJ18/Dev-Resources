<?php
use App\Models\Category;
use App\Models\Resource;
use App\Models\Link;


function user_category($id = null , $name = null){
    if($id)
        $category = Category::where('user_id', $id)->exists();
    else if($name)
        $category = Category::where('name', $name)->exists();
    else
        $category = Category::with('resources')->where('user_id', auth()->id())->get();

    return $category;
}

function user_link($id = null , $url = null){
    if($id)
        $link = Link::where('resource_id', $id)->exists();
    else if($url)
        $link = Link::where('url', $url)->exists();
    else
        $link = Link::with('resource')->where('resource_id', auth()->id())->get();
    // $links = Link::with('resource')->get();
    return $link;
}
