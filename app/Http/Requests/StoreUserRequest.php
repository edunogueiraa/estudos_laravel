<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //coloca como true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ];
    }

    public function messages() : array //mensagens em portugues
    {
        return [
            'name.required' => 'Obrigatorio o nome!',
            'email.required' => 'Obrigatorio o email!',
            'email.unique' => 'Email já existe!',
            'password.required' => 'Obrigatorio ter uma senha',
            'password.min' => 'A senha de ter 8 caracteres' 
    ];    
    }
}
