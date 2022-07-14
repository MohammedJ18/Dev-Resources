<?php

use App\Models\Resource;
use App\Models\Link;

function user_category($id = null , $name = null){
    if($id)
        $category = auth()->user()->categories()->with('resources')->exists();
    else if($name)
        $category = auth()->user()->categories()->with('resources')->where('name', $name)->exists();
    else
        $category = auth()->user()->categories()->with('resources')->get();

    return $category;
}

function user_link($id = null , $url = null){
    if($id)
        $link = Link::where('id', $id)->exists();
    else if($url)
        $link = Link::where('url', $url)->exists();
    else
        $link = Link::with('resource')->get();
    return $link;
}
