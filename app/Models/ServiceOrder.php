<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $fillable=['service_date', 'status']; 

    public function Client(): BelongsTo{
        return $this->belongsTo(Client::class); 
    }

      public function feedbacks(): HasMany{
        return $this->hasMany(Feedback::class); 
    }

     public function equipments(): HasMany{
        return $this->hasMany(Equipment::class); 
    }

    public function invoice(): HasOne{
        return $this->hasOne(Invoice::class); 
    
}

}
