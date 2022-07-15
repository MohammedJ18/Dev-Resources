<?php

use App\Models\Resource;
use App\Models\Link;

function user_link($id = null , $url = null){
    if($id)
        $link = Link::where('id', $id)->exists();
    else if($url)
        $link = Link::where('url', $url)->exists();
    else
        $link = Link::with('resource')->get();
    return $link;
}
