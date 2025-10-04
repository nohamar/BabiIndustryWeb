<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supplier extends Model
{
 
    use HasFactory, Notifiable, HasApiTokens; 
    
protected $fillable = ['first_name', 'last_name','number', 'email', 'password', 'company_name']; 

public function equipments(): HasMany{
        return $this->hasMany(Equipment::class); 
    }
}
