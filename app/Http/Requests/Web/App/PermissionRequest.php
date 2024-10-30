<?php

namespace App\Http\Requests\Web\App;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Role;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $role = Role::where('name', 'developer')->first();

        if(Auth::user()->role_id == $role->id)
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
            'name' => ['required', 'string', 'max:255', Rule::unique('permissions')->ignore($this->id)],
            'display_name' => ['required', 'string', 'max:255', Rule::unique('permissions')->ignore($this->id)],
            'description' => ['nullable', 'string', 'max:255'],
            'route' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe ser una cadena de texto',
            'name.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'name.unique' => 'El campo nombre ya ha sido registrado',
            'display_name.required' => 'El campo nombre a mostrar es requerido',
            'display_name.string' => 'El campo nombre a mostrar debe ser una cadena de texto',
            'display_name.max' => 'El campo nombre a mostrar debe tener un máximo de 255 caracteres',
            'display_name.unique' => 'El campo nombre a mostrar ya ha sido registrado',
            'description.string' => 'El campo descripción debe ser una cadena de texto',
            'description.max' => 'El campo descripción debe tener un máximo de 255 caracteres',
            'route.required' => 'El campo ruta es requerido',
            'route.string' => 'El campo ruta debe ser una cadena de texto',
            'route.max' => 'El campo ruta debe tener un máximo de 255 caracteres',
        ];
    }
}
