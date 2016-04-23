<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class LightService extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'light_services';
    public $timestamps = false;


}
