<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class GuestService extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'guest_services';
}
