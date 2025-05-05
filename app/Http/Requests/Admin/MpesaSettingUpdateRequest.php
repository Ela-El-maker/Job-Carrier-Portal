<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MpesaSettingUpdateRequest extends FormRequest
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
            'mpesa_status' => ['required','in:active,inactive'],
            'mpesa_env' => ['required','in:live,sandbox'],
            'mpesa_shortcode' => ['required'],
            'mpesa_consumer_key' => ['required'],
            'mpesa_consumer_secret' => ['required'],
            'mpesa_passkey' => ['required'],

        ];
    }
}
