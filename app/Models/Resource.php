<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HelperTrait;

class Resource extends Model
{
    use HasFactory;
    use HelperTrait;
    protected $fillable = ['name', 'description', 'icon', 'screenShot','category_id'];

    // Relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
