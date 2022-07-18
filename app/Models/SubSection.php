<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSection extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'category_id'];

     //add_image
     public function add_image($image)
     {
         $ext = $image->extension();
         $name =  \Str::random(10) . '.' . $ext;
         $image = $image->storeAs('public/subsections/', $name);
         return 'storage/subsections/' . $name;
         
     }

   
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
