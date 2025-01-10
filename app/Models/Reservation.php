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

    // Define the relationship with the event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
