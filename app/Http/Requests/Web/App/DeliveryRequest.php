<?php

namespace App\Http\Requests\Web\App;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
        if($this->address_id){
            return [
                'currency_id' => 'required|exists:currencies,id',
                'amount' => 'required',
                'place_id' => 'required|exists:places,id',
                'address_id' => 'required|exists:addresses,id',
            ];
        }

        return [
            'currency_id' => 'required|exists:currencies,id',
            'amount' => 'required',
            'place_id' => 'required|exists:places,id',
            'address' => 'required|string',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'currency_id.required' => 'El campo moneda es requerido',
            'currency_id.exists' => 'La moneda seleccionada no es válida',
            'amount.required' => 'El campo monto es requerido',
            'place_id.required' => 'El campo lugar es requerido',
            'place_id.exists' => 'El lugar seleccionado no es válido',
            'address_id.required' => 'El campo dirección es requerido',
            'address_id.exists' => 'La dirección seleccionada no es válida',
            'address.required' => 'El campo dirección es requerido',
            'lat.required' => 'El campo latitud es requerido',
            'lng.required' => 'El campo longitud es requerido',
        ];
    }
}
