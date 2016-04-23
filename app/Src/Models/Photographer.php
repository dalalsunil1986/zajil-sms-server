<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'photographers';
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
