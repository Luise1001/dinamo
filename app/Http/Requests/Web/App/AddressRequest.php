<?php

namespace App\Http\Requests\Web\App;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('addresses')->ignore($this->id)],
            'address' => ['required', 'string', 'max:255'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido.',
            'name.string' => 'El campo nombre debe ser un texto.',
            'name.max' => 'El campo nombre no debe ser mayor a 255 caracteres.',
            'name.unique' => 'El campo nombre ya ha sido registrado.',
            'address.required' => 'El campo dirección es requerido.',
            'address.string' => 'El campo dirección debe ser un texto.',
            'address.max' => 'El campo dirección no debe ser mayor a 255 caracteres.',
            'lat.required' => 'El campo latitud es requerido.',
            'lat.numeric' => 'El campo latitud debe ser un número.',
            'lng.required' => 'El campo longitud es requerido.',
            'lng.numeric' => 'El campo longitud debe ser un número.',
        ];
    }
}
