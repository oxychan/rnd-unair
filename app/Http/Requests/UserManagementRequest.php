<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserManagementRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'telp' => 'required|min:10|max:13',
            'role' => 'required',
        ];
    }
}
