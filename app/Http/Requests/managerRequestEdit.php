<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class managerRequestEdit extends FormRequest
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
             'name' => 'required|min:3|max:20|string' ,
            'email' => 'required|email|min:5|max:50' , Rule::unique('managers' , 'email')->ignore($this->id) ,
            'age' => 'required|integer|between:25,60' ,
            'gender' => 'required|in:male,female' ,
            'city' => 'required|min:2|max:25',
            'img' => 'nullable|image|mimes:png,jpg,jpeg,webp,svg' ,
        ];
    }
}
