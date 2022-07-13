<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Resource extends Model
{
    use HasFactory;
    use HelperTrait;
    protected $fillable = ['name', 'description', 'icon', 'screenShot','category_id'];
    protected $appends = [
        'image_url',
    ];

    protected $hidden = [
        'screenShot',
    ];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //Accessor
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->screenShot)
                    return asset('storage/' . $this->screenShot);

                else return 'no screenShot';
            },
        );
    }
}
