<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpresaRequest extends FormRequest
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
            'name' => 'string|max:255|sometimes',
            'cuit' => 'string|max:13|unique:empresas,cuit,id|sometimes',
            'type' => 'string|max:255|sometimes',
            'start_activity' => 'date|before:today|sometimes',
            'country' => 'string|max:255|sometimes',
            'city' => 'string|max:255|sometimes',
            'address' => 'string|max:255|sometimes',
            'phone' => 'string|max:15|sometimes',
            'mail' => 'email|unique:empresas,mail,id|sometimes',
        ];
    }
}
