<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    /** @use HasFactory<\Database\Factories\BookingStatusFactory> */
    use HasFactory;
    protected $table = 'booking_status';
    protected $fillable = ['name', 'description'];
}
