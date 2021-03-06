<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name'                  => 'required|max:255' ,
            'email'                 => 'required_without:id|email|unique:doctors,email,'.$this->id,
            'password'              => 'required_without:id',
            'gender'                => 'required' ,
            'title'              => 'required' ,
            'about'                 => 'required' ,
            'specialization_id'     => 'required|exists:specializations,id' ,
            'image'                 => 'required_without:id|image|mimes:jpg,jpeg,png,gif' ,
            'services'              => 'required' ,
            'insurance_companies'   =>  'array' ,
            'insurance_companies.*' =>     'required|exists:insurance_companies,id' ,
           'subspecialization*'    => 'array',
            'subspecialization'      => 'exists:subspecializations,id'
        ];

    }
    public function messages(){
       return [
        'name.required' => 'الاسم مطلوب',
        'name.max' =>'اسم لايزيد عن 255',
        'email.required_without' => 'البريد الالكترونى مطلوب',
        'email.max' =>'الاميل لايزيد عن 255',

        'password.required_without' => 'كلمه المرور مطلوبه',
        'gender.required' =>'النوع مطلوب',
        'title.required' => 'اللقب مطلوب',
        'about.required' =>'عن الطبيب مطلوب',
        'specialization_id.required' => 'القسم الرئيسى مطلوب',
        'image.required_without' =>'الصوره مطلوبه',
        'insurance_companies.required' =>'شركات التامين مطلوبه',
        'subspecialization.required' =>'الاقسام الفرعيه مطلوبه',
       ];
    }
}
