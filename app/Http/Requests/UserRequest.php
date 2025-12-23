<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' rule checks for matching passwords
            'phone_number'=>'required',
            'address_line_1'=>'required|string',
            'address_line_2'=>'required|string',
            'city'=>'required|string',
            'country'=>'required|string',
            'state'=>'required|string',
            'zip_code'=>'required|string',
        ];
    }
}
