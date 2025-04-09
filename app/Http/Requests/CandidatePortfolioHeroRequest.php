<?php

namespace App\Http\Requests;

use App\Models\CandidatePortfolio;
use Illuminate\Foundation\Http\FormRequest;

class CandidatePortfolioHeroRequest extends FormRequest
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
            //
            'hero_title' => 'required',
            'sub_description' => 'required',
            'background_image' => 'image|mimes:jpeg,png,webm,webp,jpg,gif|max:2048',
            'resume' => 'mimes:pdf|max:2048',
        ];

        $candidate = CandidatePortfolio::where('candidate_id', auth()->user()->candidateProfile?->id)->first();

        if (empty($candidate) || !$candidate?->background_image) {
            $rules['background_image'][] = 'required';
        }
    }
}
