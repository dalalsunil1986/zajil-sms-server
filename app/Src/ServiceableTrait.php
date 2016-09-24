<?php
namespace App\Src;
use App\Src\Models\UserService;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: ZaL
 * Date: 23/09/16
 * Time: 12:00 PM
 */
trait ServiceableTrait
{
    public function services()
    {
        return $this->morphMany(UserService::class,'service');
    }
}