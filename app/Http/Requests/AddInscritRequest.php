<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInscritRequest extends FormRequest
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
            'nomins' => 'required|string|max:150',
            'prenomins' =>'required|string|max:150',
            'dobins' => 'required',
            'lieuins' => 'required',
            'email' =>'required|email|unique:inscrits',
            'tel' => 'required',
            'password' => 'required|min:6',
            'adrins' => 'required',
            
            'special' => 'required',
            'niveauins' => 'required',
        ];
    }


    public function messages()
{
    return [
        'nomins.required' => 'يجب ادخال قيمة لهذا الحقل',
        'nomins.string' => 'يجب ادخال حروف فقط',
        'email.email' => 'ادخل بريد إلكتروني صالح',
        'email.unique' => 'ادخل بريد إلكتروني آخر',
         'email.required' => 'يجب ادخال قيمة لهذا الحقل',
        'prenomins.required' => 'يجب ادخال قيمة لهذا الحقل',
        'tel.required' => 'يجب ادخال قيمة لهذا الحقل',
        'dobins.required' => 'يجب ادخال قيمة لهذا الحقل',
        'lieuins.required' => 'يجب ادخال قيمة لهذا الحقل',
         'adrins.required' => 'يجب ادخال قيمة لهذا الحقل',
       
        'special.required' => 'ايجب ادخال قيمة لهذا الحقل',
        'niveauins.required' => 'يجب ادخال قيمة لهذا الحقل',
        'password.required' => 'يجب ادخال قيمة لهذا الحقل',
        'password.min' => 'ادخل على الأقل 6 حروف',
       
       
        
    ];
}
}
