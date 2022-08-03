<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{

    private $employee;

    public function __construct(Employee $employee){
       $this->employee = $employee;
    }
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
    public function rules(Employee $employee)
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
