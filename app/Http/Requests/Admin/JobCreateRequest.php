<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'company' => ['required', 'integer', 'exists:companies,id'],
            'category' => ['required', 'integer', 'exists:job_categories,id'],
            'vacancies' => ['required', 'integer', 'min:1'],
            'deadline' => ['required', 'date', 'after:today'],

            'country' => ['nullable', 'integer', 'exists:countries,id'],
            'state' => ['nullable', 'integer', 'exists:states,id'],
            'city' => ['nullable', 'integer', 'exists:cities,id'],
            'address' => ['nullable', 'string', 'max:255'],

            'salary_mode' => ['required', 'in:range,custom'],
            'min_salary' => ['required_if:salary_mode,range', 'nullable', 'numeric', 'min:0'],
            'max_salary' => [
                'required_if:salary_mode,range',
                'nullable',
                'numeric',
                'min:0',
                'gte:min_salary'
            ],
            'custom_salary' => [
                'required_if:salary_mode,custom',
                'nullable',
                'string',
                'max:255'
            ],

            'salary_type' => ['required', 'integer', 'exists:salary_types,id'],
            'experience' => ['required', 'integer', 'exists:job_experiences,id'],
            'job_role' => ['required', 'integer', 'exists:job_roles,id'],
            'education' => ['required', 'integer', 'exists:education,id'],
            'job_type' => ['required', 'integer', 'exists:job_types,id'],

            'tags' => ['required', 'array', 'min:1'],
            'tags.*' => ['integer', 'exists:tags,id'],
            'benefits' => ['required', 'string'],
            'skills' => ['required', 'array', 'min:1'],
            'skills.*' => ['integer', 'exists:skills,id'],

            'receive_applications' => ['required', 'in:email,custom_url'],
            'description' => ['required', 'string', 'min:50'],
        ];
    }


    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Convert empty custom_salary to null when in range mode
        if ($this->salary_mode === 'range') {
            $this->merge(['custom_salary' => null]);
        }
    }
}
