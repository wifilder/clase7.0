<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            //Para indicarle que el campo no pase o que no genere duplicados
            'name' => 'required|min:3|unique:categories',
            //Aca la validamos que solo sea una imagen mas no un video
            //'image' => 'required|image|mimes:jpeg,png,gif'
            'image' => 'required|image|mimes:jpeg,png,gif|max:900'            
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El nombre de la categoria es requerido',
            'name.min' => 'El nombre de la categoria debe tener minimo tres caracteres',
            'name.unique' => 'El nombre dado ya existe',
            'image.required' => 'La imagen es requerida',
            'image.image' => 'El archivo adjunto debe ser una imagen'
        ];
    }
    
}
