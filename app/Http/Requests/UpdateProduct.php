<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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


    public function messages()
    {
        return [

            'product.min' => 'Nome não pode ser menor que 3.',
            'product.required' => 'Nome não pode ser vazio.',
            'price.required' => 'Preço não pode ser vazio.',
            'price.min' => 'Preço não pode ser menor que 3.',
            'description.min' => 'Descrição não poder ser menor do que 5 caracteres.'
            
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'product' => 'bail|required|string|min:3',
            'description' => 'bail|required|string|min:5',
            'price' => 'bail|required|min:3',
        ];
    }
}
