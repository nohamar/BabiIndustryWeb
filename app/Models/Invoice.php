<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable =['issue_date', 'total_number', 'status']; 

 public function service_orders(): BelongsTo{
        return $this->belongsTo(ServiceOrder::class); 
    }

}
