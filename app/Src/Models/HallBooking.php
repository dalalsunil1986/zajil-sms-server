<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class HallBooking extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'hall_bookings';
}
