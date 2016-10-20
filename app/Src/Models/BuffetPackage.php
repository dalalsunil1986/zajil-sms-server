<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class BuffetPackage extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'buffet_packages';
    public $timestamps = false;

    protected $casts = [
        'active' => 'boolean',
    ];

    public function buffet()
    {
        return $this->belongsTo(Buffet::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
