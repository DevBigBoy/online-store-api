<?php

namespace App\Http\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Interfaces\Auth\AuthInterface;
use App\Traits\HttpResponses;

class AuthRepository implements AuthInterface
{
    use HttpResponses;

    public function register($request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', 'min:8'],
            ]
        );


        if ($validation->fails()) {
            return $this->error($validation->errors(), 'Validation Error', 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $this->success($user, 'Account Was Created', 200);
    }

    public function login($request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'string', 'email', 'exists:users,email'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        if ($validation->fails()) {
            return $this->error($validation->errors(), 'Credentials do not match', 400);
        }

        $credentials = $request->only(['email', 'password']);


        if (!$token = auth()->attempt($credentials)) {
            return $this->error('', 'Credentials do not match', 401);
        }

        return $this->success($token, 'Login Successful', 200);
    }
}
