<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    protected $fillable =['issue_date', 'total_number', 'status' , 'service_id']; 

 public function serviceOrder(): BelongsTo{
        return $this->belongsTo(ServiceOrder::class); 
    }

}
