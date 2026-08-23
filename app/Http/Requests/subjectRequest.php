<?php

namespace App\Http\Requests;

use App\Models\subject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class subjectRequest extends FormRequest
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
            'name' => "required|min:2|max:25|unique:subjects,name" ,
            'year_id' => "required|exists:years,id" ,
            'dependency' => "exists:subjects,name|nullable|" ,
        ];
    }




    // public function withValidator(Validator $validator)
    // {
    //     $validator->after(function ($validator) {

    //         if (!$this->dependency) return;

    //         $dependency = subject::find($this->dependency);
    //         if (!$dependency) return;

    //         // ❌ ممنوع تعتمد على مادة من سنة أعلى
    //         if ($dependency->year_id > $this->year) {
    //             $validator->errors()->add(
    //                 'dependency',
    //                 'This subject cannot depend on a subject from a higher academic year.'
    //             );
    //         }
    //     });
    // }
}
