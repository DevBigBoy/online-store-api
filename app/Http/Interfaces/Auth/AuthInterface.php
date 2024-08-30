<?php

namespace App\Http\Interfaces\Auth;


interface AuthInterface
{
    public function register($request);

    public function login($request);
}
