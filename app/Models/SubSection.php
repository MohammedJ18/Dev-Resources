<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HelperTrait;
class SubSection extends Model
{
    use HasFactory;
    use HelperTrait;
    protected $fillable = ['name', 'user_id', 'category_id' , 'image'];

    protected $appends = [
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
}
