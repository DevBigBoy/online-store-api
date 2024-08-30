<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\Auth\AuthInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(public AuthInterface $authInterface) {}



    public function register(Request $request)
    {
        return $this->authInterface->register($request);
    }


    public function login(Request $request)
    {
        return $this->authInterface->login($request);
    }
}
