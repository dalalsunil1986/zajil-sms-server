<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'orders';


}
