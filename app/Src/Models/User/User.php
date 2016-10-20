<?php

namespace App\Src\Models\User;

use App\Src\Models\Order;
use App\Src\Models\UserService;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $hidden = ['password', 'remember_token','activation_code','api_token'];

    public function services()
    {
        return $this->hasMany(UserService::class);
    }


}
