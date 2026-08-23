<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class teacherRequestAdd extends FormRequest
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
            'email'=> 'required|email|unique:teachers|min:5' ,
            'password'=> 'required|min:6' ,
            'phone' => 'required|unique:teachers,phone|starts_with:01|size:11' ,
            'age' => 'required|integer|between:23,100',
            'gender' => 'required|in:male,female' ,
            'city' => 'required|min:3|max:55' ,
            'subject_id'=> 'required|exists:subjects,id' ,
            'bio' => 'required|min:6|max:255' ,
            'img'=> 'required|image|mimes:png,jpg,jpeg,webp,svg',

        ];
    }
}
