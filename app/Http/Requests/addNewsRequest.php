<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addNewsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'titre'=>'required|min:5|max:150',
            'sujet'=>'required|min:10',
            'keywordnews'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            
            
        ];
    }

 public function messages()
{
    return [
        'titre.required' => 'يجب ادخال قيمة لهذا الحقل',
        'titre.min' => 'يجب ادخال عنوان أكثر من 5 حروف',
        'sujet.required' => 'يجب ادخال قيمة لهذا الحقل',
        'sujet.min' => 'يجب ادخال عنوان أكثر من 10 حروف',
        
        'keywordnews.required' => 'يجب ادخال قيمة لهذا الحقل',
        'image.required' => 'يجب ادخال قيمة لهذا الحقل',
        'image.mimes' => 'يجب ادخال ملف من نوع صورة',
        
        
       
       
        
    ];
}
}
