<?php

namespace App\Src\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $hidden = ['hall_id','photographer_id','guest_service_id','message_id','buffet_package_id','light_service_id'];
    protected $table = 'orders';

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function photographer()
    {
        return $this->belongsTo(Photographer::class);
    }

    public function guestService()
    {
        return $this->belongsTo(GuestService::class);
    }

    public function lightService()
    {
        return $this->belongsTo(LightService::class);
    }

    public function buffetPackage()
    {
        return $this->belongsTo(BuffetPackage::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function getMessageDateAttribute($date)
    {
        return Carbon::parse($date);
    }

    public function getBuffetDateAttribute($date)
    {
        return Carbon::parse($date);
    }

    public function getHallDateAttribute($date)
    {
        return Carbon::parse($date);
    }

    public function getPhotographerDateAttribute($date)
    {
        return Carbon::parse($date);
    }

    public function getLightServiceDateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getGuestServiceDateAttribute($date)
    {
        return Carbon::parse($date);
    }
}
