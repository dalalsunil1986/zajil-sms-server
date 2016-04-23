<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'messages';
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
