<?php

namespace App\Src\Models;

use App\Src\Models\User\User;
use App\Src\ServiceableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ad extends Model
{

    use ServiceableTrait;

    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'ads';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
