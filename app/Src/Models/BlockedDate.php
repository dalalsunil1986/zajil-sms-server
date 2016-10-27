<?php

namespace App\Src\Models;

use App\Src\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BlockedDate extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'blocked_dates';
    public $timestamps = false;

    public function service()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('service_type', $type);
    }

}
