<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['first_name', 'second_name', 'number', 'email', 'password', 'birthday'];
}
