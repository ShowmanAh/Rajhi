<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            'name'  => 'required' ,
            'city_id' => 'required|exists:cities,id'
        ];
    }
    public function messages(){
     return [
      'name.required' => 'هذا الاسم مطلوب',
      'city_id.required' => 'اسم المدينه مطلوب'
        ];

    }
}
