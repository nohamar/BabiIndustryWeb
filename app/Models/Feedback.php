<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feedback extends Model
{
    protected $fillable =['rating', 'comments', 'client_id', 'service_id']; 

     public function client(): BelongsTo{
        return $this->belongsTo(Client::class); 
    }

    public function serviceOrder(): BelongsTo{
        return $this->belongsTo(ServiceOrder::class); 
    }
}


