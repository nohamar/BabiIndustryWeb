<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
 
protected $fillable = ['first_name', 'last_name','number', 'email', 'password', 'company_name']; 

public function equipments(): HasMany{
        return $this->hasMany(Equipment::class); 
    }
}
