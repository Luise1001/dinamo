<?php

namespace App\Http\Requests\Web\App;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::user()->role_id == 1)
        {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($this->id)],
            'display_name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($this->id)],
            'description' => ['required', 'string', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe ser una cadena de texto',
            'name.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'name.unique' => 'El nombre del rol ya existe',
            'display_name.required' => 'El campo nombre a mostrar es requerido',
            'display_name.string' => 'El campo nombre a mostrar debe ser una cadena de texto',
            'display_name.max' => 'El campo nombre a mostrar debe tener un máximo de 255 caracteres',
            'display_name.unique' => 'El nombre a mostrar del rol ya existe',
            'description.required' => 'El campo descripción es requerido',
            'description.string' => 'El campo descripción debe ser una cadena de texto',
            'description.max' => 'El campo descripción debe tener un máximo de 255 caracteres'
        ];
    }
}
