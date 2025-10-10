<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Equipment extends Model
{
      protected $table = 'equipments'; 
    protected $fillable = ['name', 'description', 'serial_number', 'status', 'service_id', 'supplier_id']; 

    public function serviceOrder(): BelongsTo{
        return $this->belongsTo(ServiceOrder::class); 
    }

    public function supplier(): BelongsTo{
        return $this->belongsTo(Supplier::class); 
    }


    public function maintenanceSchedules(): HasMany{
        return $this->hasMany(MaintenanceSchedule::class); 
    }

}
