<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class teacherRequestEdit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|string|min:5|max:55' ,
            'email'=> 'required|email|min:5' , Rule::unique('teachers' , 'email')->ignore($this->id) ,

            'phone' => 'required|starts_with:01|size:11' , Rule::unique('teachers' , 'phone')->ignore($this->id) ,
            'age' => 'required|integer|between:23,100',
            'gender' => 'required|in:male,female' ,
            'city' => 'required|min:3|max:55' ,
            'subject_id'=> 'required|exists:subjects,id' ,
            'bio' => 'required|min:6|max:255' ,
            'img'=> 'nullable|image|mimes:png,jpg,jpeg,webp,svg',

        ];
    }
}
