<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HelperTrait;

class Tag extends Model
{
    use HasFactory;
    use HelperTrait;
    protected $fillable = ['name'];

    protected $appends = [
        'created_time',
        'updated_time',

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Relationship
    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}
