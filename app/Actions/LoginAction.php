<?php

namespace App\Actions;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginAction 
{
    public function handle(LoginRequest $request)
    {
        $input = $request->only('email', 'password');

        if (auth()->attempt($input)) {
            if (auth()->user()->admin == 'true') {
                return true;
            } else {
                return false;
            }
        } else {
            return ('Invalid password');
        }
        
    }
}