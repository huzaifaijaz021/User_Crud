<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z ]+$/|min:3|max:15',
            'email' => [
                'required',
                 Rule::unique('employees')->ignore($this->id),
            ],
             'password'=>'required|min:5|max:20',
             'address'=>'required',
             'phone' => 'required|numeric|min:12',
             'salary' => 'required|numeric',
             'position'=>'required',
             'date_of_birth'=>'required',
            ];
                  
            // if ($this->has('id')) {
                if(request()->id){
                $rules['image'] = 'nullable|image|mimes:jpeg,jpg,png';
            } else {
                $rules['image'] = 'required|image|mimes:jpeg,jpg,png';
            }
            return $rules;
        } 
}
