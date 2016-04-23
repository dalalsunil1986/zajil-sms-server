<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Buffet extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'buffets';
    public $timestamps = false;

}
