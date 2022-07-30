<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SubSection extends Model
{
    use HasFactory;
    use HelperTrait;
    protected $fillable = ['name', 'user_id', 'category_id' , 'image'];

    protected $appends = [
        'image_url',
        'created_time',
        'updated_time',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

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
