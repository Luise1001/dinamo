<?php

namespace App\Http\Requests\Web\App;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DriverRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255', Rule::unique('drivers', 'document')->ignore($this->id)],
            'phone' => ['required', 'string', 'max:255', Rule::unique('drivers', 'phone')->ignore($this->id)],
            'license_number' => ['required', 'string', 'max:255', Rule::unique('drivers', 'license_number')->ignore($this->id)],
            'license_type' => ['required', 'string', 'max:255'],
            'license_expiration' => ['required', 'string', 'max:255'],
            'responsible_id' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'last_name.required' => 'El campo apellido es requerido',
            'document.required' => 'El campo documento es requerido',
            'document.unique' => 'El documento ya se encuentra registrado',
            'phone.required' => 'El campo teléfono es requerido',
            'phone.unique' => 'El teléfono ya se encuentra registrado',
            'license_number.required' => 'El campo número de licencia es requerido',
            'license_number.unique' => 'El número de licencia ya se encuentra registrado',
            'license_type.required' => 'El campo tipo de licencia es requerido',
            'license_expiration.required' => 'El campo vencimiento de licencia es requerido',
            'responsible_id.required' => 'El campo responsable es requerido',

        ];
    }
}
