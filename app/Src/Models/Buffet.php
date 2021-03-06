<?php

namespace App\Src\Models;

use App\Src\ServiceableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Buffet extends Model
{

    use ServiceableTrait;

    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'buffets';
    public $timestamps = false;
    protected $with = ['packages'];

    protected $casts = [
        'buffet_id' => 'int',
    ];

    public function packages()
    {
        return $this->hasMany(BuffetPackage::class);
    }

}
