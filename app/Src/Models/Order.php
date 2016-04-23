<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
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

}
