<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HelperTrait;

class Link extends Model
{
    use HasFactory;
    use HelperTrait;
    protected $fillable = ['url' , 'resource_id'];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
