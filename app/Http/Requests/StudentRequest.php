<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function onUpadate(){
        return [
                'name'=>['required','alpha_dash'],
                'email'=>['required','email'],
                'phone'=>['nullable','regex:/^(010|011|015|012)[0-9]{8}$/'],
                'department'=>['integer']

        ];
    }
    public function onCreate(){
        return [
            'code'=>['required','integer','unique:students,code'],
            'name'=>['required','alpha_dash'],
            'email'=>['required','email'],
            'phone'=>['nullable','regex:/^(010|011|015|012)[0-9]{8}$/'],
            'department'=>['integer'],
            'phote'=>['image']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        if(request()->isMethod('put')){
            return $this->onUpadate();
        }else{
            return $this->onCreate();
        }
    }

    public function messages()
    {
        return [
                'code.required' =>'Please Enter Student Code',
                'code.integer' =>'Please Enter Valid Code',
                'name.required' =>'Please Enter Student Name',
                'name.alpha_dash' =>'Please Enter Valid Student Name',
                'email.required' =>'Please Enter Student Email',
                'email.email' =>'Please Enter Valid Student Email',
            ];
    }
}
