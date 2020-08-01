<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CenterRequest extends FormRequest
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
            'logo'                  => 'required_without:id|mimes:jpg,jpeg,png',
            'name'                  => 'required|max:255' ,
            'email'                 => 'required_without:id|email|unique:centers,email,'.$this->id,
            'password'              => 'required_without:id',
            'address'               => 'required|string|max:500',
            'about'                 => 'required|max:500',
            'area_id'              => 'required|exists:areas,id',
            'city_id'              => 'required|exists:cities,id',
        ];
    }
    public function messages(){
        return [
         'name.required' => 'الاسم مطلوب',
         'address.required' => 'العنوان مطلوب',
         'name.max' =>'اسم لايزيد عن 255',
         'email.required_without' => 'البريد الالكترونى مطلوب',
         'email.max' =>'الاميل لايزيد عن 255',
        'email.email' =>'الاميل لابد ان يحتوى@gmail/hotmail/yahoo',
         'password.required_without' => 'كلمه المرور مطلوبه',
         'logo.required_without' =>'الصوره مطلوبه',
         'about.required' => 'معلومات المركز مطلوبه',
         'area_id.required' =>       'المنطقه مطلوبه',
         ];
     }
}
