<?php

namespace App\Http\ControllersRequests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;


class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
            'name'=>'required|alpha_dash',
            'name'=>'required|alpha_dash',// nom de l'entreprise
            'email'=>'required|email',
            'password' =>'required|min:6|confirmed',

        ];
    }
}
