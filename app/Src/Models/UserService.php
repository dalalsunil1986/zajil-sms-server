<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserService extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'service_users';
    public $timestamps = false;

    /**
     * Get all of the owning commentable models.
     */
    public function service()
    {
        return $this->morphTo();
    }
}
