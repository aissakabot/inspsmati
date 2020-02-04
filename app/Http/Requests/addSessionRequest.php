<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addSessionRequest extends FormRequest
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
        'libelle' => 'required',
            'datedebut' => 'required'];
    }

       public function messages()
{
return [
    'libelle.required' => 'يجب ادخال قيمة لهذا الحقل',
        'datedebut.required' => 'يجب ادخال قيمة لهذا الحقل',
        ];
}
}
