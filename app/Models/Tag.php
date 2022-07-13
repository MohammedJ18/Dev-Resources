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

    // Relationship
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
