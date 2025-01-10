<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'location',
        'image',
        'date', // Add date here
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
