<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addRealisationRequest extends FormRequest
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
            'titre'=>'required|min:5|max:150',
            'special'=>'required',
            'descrip'=>'required',
            'imagerealis'=>'required|image',
            'equipe'=>'required',
            'keywordrealis'=>'required',
            'daterealis'=>'required'
        ];
    }

 public function messages()
{
    return [
        'titre.required' => 'يجب ادخال قيمة لهذا الحقل',
        'titre.min' => 'يجب ادخال عنوان أكثر من 5 حروف',
        'special.required' => 'يجب ادخال قيمة لهذا الحقل',
        'descrip.required' => 'يجب ادخال قيمة لهذا الحقل',
        'equipe.required' => 'يجب ادخال قيمة لهذا الحقل',
        'keywordrealis.required' => 'يجب ادخال قيمة لهذا الحقل',
        'daterealis.required' => 'يجب ادخال قيمة لهذا الحقل',
        
        
        'imagerealis.required' => 'يجب ادخال قيمة لهذا الحقل',
        'imagerealis.image' => 'يجب إدخال ملف من نوع صورة',
       
        
    ];
}

}
