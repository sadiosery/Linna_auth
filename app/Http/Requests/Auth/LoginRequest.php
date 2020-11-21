<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginRequest extends Controller
{
    public function rules(){
        return[
            'email'=>'required|email',
            'password' =>'required|min:6',
        ];
    }
    public function message(){
        return[
            'email.required'=>'Il me faut une adresse email',
            'email.email'=>"Ce ci n'est pas une adresse email valide",
            'password.required' =>'Il me faut un mot de mot de pass',
            'password.min' =>'Le mot de pass doit etre au minimun 6 caracteres',
        ];
    }
}
