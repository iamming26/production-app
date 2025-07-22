<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
<<<<<<< HEAD
    protected $guarded = ['id'];
=======
    protected $primaryKey = 'lot_id';

    protected $fillable = [
        'lot_id',
        'qty',
        'qty_remaining',
        'status',
    ];

      protected $casts = [
        'lot_id' => 'string',
    ];
>>>>>>> dev-romi
}
