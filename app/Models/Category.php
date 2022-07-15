<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HelperTrait;


class Category extends Model
{
    use HasFactory;
    use HelperTrait;

    protected $fillable = ['name' , 'user_id'];

    // Relationship

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function subsections()
    {
        return $this->hasMany(SubSection::class);
    }
}
