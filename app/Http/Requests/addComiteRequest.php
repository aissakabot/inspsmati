<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addComiteRequest extends FormRequest
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
            'libelle' => 'required|min:3|max:150',
            'descrip' =>'required|min:5',
            'datefin' => 'required',
            'datedebut' => 'required',
            'image' =>'required|mimes:jpg,jpeg,png',
        ];
    }
}
