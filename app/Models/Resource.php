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
    protected $fillable = ['category_id', 'subsection_id', 'user_id', 'name', 'description', 'screenShot', 'state'];
    protected $appends = [
        'image_url',
        'created_time',
        'updated_time',

    ];

    protected $hidden = [
        'screenShot',
        'created_at',
        'updated_at',
    ];

    ### Relationship ##
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subsection()
    {
        return $this->belongsTo(SubSection::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }



    ### End Relationship ###


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
