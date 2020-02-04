<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addActualspecRequest extends FormRequest
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
            'intitule'=>'required',
            'type'=>'required',
            'datedebut'=>'required',
            'datefin'=>'required',
            'soumestre'=>'required',
            'professeur'=>'required',
             'diplome'=>'required',
             'nbrstag'=>'required',
             'descrip'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            
            
        ];
    }


     public function messages()
{
    return [
        'intitule.required' => 'يجب ادخال قيمة لهذا الحقل',
        'type.required' => 'يجب ادخال قيمة لهذا الحقل',
        'descrip.required' => 'يجب ادخال قيمة لهذا الحقل',
        'datedebut.required' => 'يجب ادخال قيمة لهذا الحقل',
        'datefin.required' => 'يجب ادخال قيمة لهذا الحقل',
        'soumestre.required' => 'يجب ادخال قيمة لهذا الحقل',
        'diplome.required' => 'يجب ادخال قيمة لهذا الحقل',
        'professeur.required' => 'يجب ادخال قيمة لهذا الحقل',
         'nbrstag.required' => 'يجب ادخال قيمة لهذا الحقل',

        'image.required' => 'يجب ادخال قيمة لهذا الحقل',
        'image.mimes' => 'الرجاء ادخال ملف من نوع صورة',
       
        
    ];
}
}
