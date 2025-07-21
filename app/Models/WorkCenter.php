<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkCenter extends Model
{
    protected $primaryKey = 'code';
    
    protected $fillable = ['code', 'name', 'desc'];
    
    protected $casts = [
        'code' => 'string',
    ];
}
