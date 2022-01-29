<?php

namespace App\Http\Requests;


use Maksi\LaravelRequestMapper\Validation\BeforeType\Laravel\AbstractValidationRule;

class LessonTrValidator extends AbstractValidationRule
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
//    public function rules()
//    {
//        return [
//            'name' => 'required',
//            'ects' => 'required', // + dipsifios
//            'link' => 'required | type:link' ,
//            'semester' => 'required' // + winter , summer
//        ];
//    }
    /**
     * @return array
     */
    public function rules(): array
    {
        {
        return [
            'name' => 'required',
            'ects' => 'required', // + dipsifios
            'link' => 'required | type:link' ,
            'semester' => 'required' // + winter , summer
        ];
    }
    }
}
