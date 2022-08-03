<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'bail|required',
            'email' => 'bail|required|email|unique:employees,email',
            'description' => 'bail|required',
            'rol' => 'bail|required'
        ];
    }
    public function messages()
    {
        return [
            'required'      =>  'El :attribute es requerido',
            'email.email'   =>  'Escriba un correo valido',
            'email.unique'  =>  'Este email ya existe'
        ];
    }
}
