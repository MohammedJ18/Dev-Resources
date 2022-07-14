<?php

use App\Models\Resource;


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
    $resources = Resource::get();
    //get all links of user
    $links = $resources->links()->get();

    // ->map(function($item){
    //     return $item->links;
    // });
    return $links;
}
