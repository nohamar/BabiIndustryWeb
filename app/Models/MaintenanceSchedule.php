<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MaintenanceSchedule extends Model
{
    protected $fillable =['maintenance_date', 'type', 'equipment_id']; 

      public function equipment(): BelongsTo{
        return $this->belongsTo(Equipment::class); 
    }
}
