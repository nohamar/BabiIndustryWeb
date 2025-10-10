<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceOrder extends Model
{
    protected $fillable=['service_date', 'status', 'client_id']; 

    public function client(): BelongsTo{
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
