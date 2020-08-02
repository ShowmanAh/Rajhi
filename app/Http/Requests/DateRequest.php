<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateRequest extends FormRequest
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
            'doctor_id' => 'required|exists:doctors,id' ,
            'clinic_id' => 'required|exists:clinics,id' ,
           'days' => 'required|array',
           'days.*'    => 'in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday' ,
           'from' => 'required|array',
           'to' => 'required|array'
        ];
    }
    public function messages(){
      return [
        'doctor_id.required' => 'الدكتور مطلوب',
        'clinic_id.required' => 'العياده مطلوبه',
         'from.required' => 'الوقت مطلوب',
         'to.required' => 'الوقت مطلوب',
        'days.required' => 'الايام مطلوبه',
      ];
    }
}
