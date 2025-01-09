<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use HasFactory;

class Reservation extends Model
{
   
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'seats',
    ];
}
