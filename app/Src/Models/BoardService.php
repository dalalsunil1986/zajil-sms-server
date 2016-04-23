<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class BoardService extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'board_services';

}
