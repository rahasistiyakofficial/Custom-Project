<?php


namespace App\CPU;


use Illuminate\Support\Facades\Auth;

class Helpers
{
    public function UserId()
    {
        return isset(Auth::user()->id) ? Auth::user()->id : 1;
    }
}
