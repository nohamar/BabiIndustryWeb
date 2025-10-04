<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = ['first_name', 'second_name', 'number', 'email', 'password', 'birthday'];

    public function service_orders(): HasMany{
        return $this->hasMany(ServiceOrder::class); 
    }

    public function feedbacks(): HasMany{
        return $this->hasMany(Feedback::class); 
    }
}
