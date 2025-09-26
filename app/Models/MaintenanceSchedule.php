<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceSchedule extends Model
{
    protected $fillable =['maintenance_date', 'type']; 

      public function equipment(): BelongsTo{
        return $this->belongsTo(Equipment::class); 
    }
}
