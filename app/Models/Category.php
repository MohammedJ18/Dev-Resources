<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HelperTrait;


class Category extends Model
{
    use HasFactory;
    use HelperTrait;

    protected $fillable = ['name' , 'image'];

    // Relationship

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function subsections()
    {
        return $this->hasMany(SubSection::class);
    }

    //Accessor
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->image)
                    return asset('storage/' . $this->image);

                else return 'no image';
            },
        );
    }
}
