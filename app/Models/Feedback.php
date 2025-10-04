<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feedback extends Model
{
    protected $fillable =['rating', 'comments']; 

     public function Client(): BelongsTo{
        return $this->belongsTo(Client::class); 
    }

    public function service_orders(): BelongsTo{
        return $this->belongsTo(ServiceOrder::class); 
    }
}


