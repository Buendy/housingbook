<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        switch($this->method()) {
            case 'GET':
            case 'POST':
            case 'PUT':
                return ['name' => 'required | min:3 | regex:/^[a-zA-Z ]*$/' ,
                    'last_name' => 'required | min:3 | max:300 | regex:/^[a-zA-Záéíóú ]*$/',
                    'email' => ['required', 'min:10', 'max:100', Rule::unique('users','email')->ignore($this->user->id)],
                    'address' => 'required',
                    'phone' => ['required', 'regex:/^[9|6|7|8][0-9]{8}$/']];
            case 'PATCH':
            default:break;
        }
    }
}
