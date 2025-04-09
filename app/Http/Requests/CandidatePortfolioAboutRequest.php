<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatePortfolioAboutRequest extends FormRequest
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
            // 'portfolio_about' => 'required|string',
            'socials' => 'nullable|array',
            'socials.*.type' => 'nullable|string|exists:social_platforms,type',
            'socials.*.url' => 'nullable|active_url',
        ];
    }
}
