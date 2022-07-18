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
    
    protected $appends = [
        'created_time',
        'updated_time',

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
