<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['first_name', 'second_name', 'number', 'email', 'password', 'birthday'];

    public function service_orders(): HasMany{
        return $this->hasMany(ServiceOrder::class); 
    }

    public function feedbacks(): HasMany{
        return $this->hasMany(Feedback::class); 
    }
}
