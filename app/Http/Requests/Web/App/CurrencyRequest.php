<?php

namespace App\Http\Requests\Web\App;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurrencyRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('currencies')->ignore($this->id)],
            'code' => ['required', 'string', 'max:5', Rule::unique('currencies')->ignore($this->id)],
            'rate' => 'required',
            'min_user' => 'required',
            'max_user' => 'required',
            'max_driver' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no debe exceder los 255 caracteres',
            'name.unique' => 'El nombre ya se encuentra registrado',
            'code.required' => 'El código es requerido',
            'code.string' => 'El código debe ser una cadena de texto',
            'code.max' => 'El código no debe exceder los 5 caracteres',
            'code.unique' => 'El código ya se encuentra registrado',
            'rate.required' => 'La tasa es requerida',
            'min_user.required' => 'El mínimo de usuario es requerido',
            'max_user.required' => 'El máximo de usuario es requerido',
            'max_driver.required' => 'El máximo de conductor es requerido',
        ];
    }
}
