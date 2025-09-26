<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['name', 'description', 'serial_number', 'status']; 

    public function serviceorders(): BelongsTo{
        return $this->belongsTo(ServiceOrder::class); 
    }

    public function supplier(): BelongsTo{
        return $this->belongsTo(Supplier::class); 
    }


    public function maintenance_schedules(): HasMany{
        return $this->hasMany(MaintenanceSchedule::class); 
    }

}
