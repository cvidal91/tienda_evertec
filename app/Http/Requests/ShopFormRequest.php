<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required',
            'customer_email' => 'email:filter',
            'customer_mobile' => 'required|numeric',
            'customer_price_order' => 'required|numeric',
            'customer_description_order' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_name.required' => 'El campo nombre completo es obligatorio',
            'customer_email.email' => 'El campo email debe ser un correo electrónico valido',
            'customer_mobile.required' => 'El campo teléfono es obligatorio',
            'customer_mobile.numeric' => 'El campo teléfono debe ser numérico',
            'customer_price_order.required' => 'el precio del producto no puede ser vacio',
            'customer_price_order.numeric' => 'el valor del producto debe ser numérico',
            'customer_description_order.required' => 'valor incorrecto para la descripción del produccto',
        ];
    }
}
