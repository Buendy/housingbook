<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            case 'DELETE':
                return [
                    'idHolder' => 'numeric'
                ];
            case 'POST':
                return [
                    'name' => 'required | min:3 | unique:apartments,name',
                    'description' => 'required | min:3 | max:300',
                    'address' => 'required | min:10 | max:100',
                    'short_description' => 'required | min:3 | max: 100',
                    'city' => 'required | exists:cities,id',
                    'services' => 'required',
                    'category' => 'required',
                    'price' => 'required',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => ['required','min:3',\Illuminate\Validation\Rule::unique('apartments','name')->ignore($this->id)],
                    'description' => 'required | min:3 | max:300',
                    'address' => 'required | min:10 | max:100',
                    'short_description' => 'required | min:3 | max: 100',
                    'city' => 'required | exists:cities,id',
                    'services' => 'required',
                    'category' => 'required',
                    'price' => 'required'
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'idHolder.numeric' => __('apartments.problem')
        ];
    }
}
