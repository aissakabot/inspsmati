<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addDocumentRequest extends FormRequest
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
            'descrip' =>'required',
            'fichier' => 'required',
            
        ];
    }

    public function messages()
{
    return [
        'libelle.required' => 'يجب ادخال قيمة لهذا الحقل',
        'descrip.required' => 'يجب ادخال قيمة لهذا الحقل',
       
        'fichier.required' => 'يجب ادخال قيمة لهذا الحقل',
        
       
        
    ];
}
}
