<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addSpecialiteRequest extends FormRequest
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
          'type'=>'required', 
          'branchep'=>'required',
           'code'=>'required',
            'intitule' =>'required',
             'niveauqual'=>'required',
             'duree'=>'required', 
             'volumeh'=>'required',
              'diplome'=>'required', 
              'conditionacc'=>'required', 
              'modepriv'=>'required'
        ];
    }
  public function messages()
{
    return [
        'type.required' => 'يجب ادخال قيمة لهذا الحقل',
        'branchep.required' => 'يجب ادخال قيمة لهذا الحقل',
        'code.required' => 'يجب ادخال قيمة لهذا الحقل',
        'intitule.required' => 'يجب ادخال قيمة لهذا الحقل',
        'niveauqual.required' => 'يجب ادخال قيمة لهذا الحقل',
        'duree.required' => 'يجب ادخال قيمة لهذا الحقل',
        'volumeh.required' => 'يجب ادخال قيمة لهذا الحقل',
         'diplome.required' => 'يجب ادخال قيمة لهذا الحقل',
        'conditionacc.required' => 'يجب ادخال قيمة لهذا الحقل',
        'modepriv.required' => 'يجب ادخال قيمة لهذا الحقل',
       
        
    ];
}

}
