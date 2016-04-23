<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'halls';
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
