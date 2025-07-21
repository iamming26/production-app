<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = ['date', 'shift', 'workcenter_id', 'lot_id', 'qty_output', 'operator_id', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }
    public function workcenter()
    {
        return $this->belongsTo(WorkCenter::class, 'workcenter_id', 'code');
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'lot_id');
    }
}
