<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCadreRequest extends FormRequest
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
            'nom' => 'required|min:3|max:150',
            'prenom' =>'required|min:5|max:150',
            'prof' => 'required',
            'datenomin' => 'required',
            'email'=>'email|unique:cadres',
            'tel' => 'required',
            
            'image' =>'required|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
{
    return [
        'nom.required' => 'يجب ادخال قيمة لهذا الحقل',
        'nom.min' => 'ادخل اسما أكثر من 3 حروف',
        'email.email' => 'ادخل بريد إلكتروني صالح',
        'email.unique' => 'ادخل بريد إلكتروني آخر',
        'prenom.required' => 'يجب ادخال قيمة لهذا الحقل',
        'prof.required' => 'يجب ادخال قيمة لهذا الحقل',
        'datenomin.required' => 'يجب ادخال قيمة لهذا الحقل',
         'tel.required' => 'يجب ادخال قيمة لهذا الحقل',
        'image.required' => 'يجب ادخال قيمة لهذا الحقل',
        'image.mimes' => 'الرجاء ادخال ملف من نوع صورة',
       
        
    ];
}
}
