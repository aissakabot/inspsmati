<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class addModulSpecRequest extends FormRequest
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
            'special' => 'required',
            'soum_id' =>'required',
            'module' => 'required',
            'volh' => 'required|integer',
            'coef'=>'required|integer',
            'noteelimin' => 'required|integer',
        ];
    }

    public function messages()
{
    return [
        'special.required' => 'يجب ادخال قيمة لهذا الحقل',
        'soum_id.required' => 'يجب ادخال قيمة لهذا الحقل',
       
        'module.required' => 'يجب ادخال قيمة لهذا الحقل',
        'volh.required' => 'يجب ادخال قيمة لهذا الحقل',
        'coef.required' => 'يجب ادخال قيمة لهذا الحقل',
         'noteelimin.required' => 'يجب ادخال قيمة لهذا الحقل',
        'volh.integer' => 'يجب ادخال قيمة صحيحة',
        'coef.integer' => 'الرجاء ادخالقيمة صحيحة',
        'noteelimin.integer' => 'الرجاء ادخال قيمة صحيحة',
       
        
    ];
}
}
