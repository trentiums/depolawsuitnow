<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'first_name' => [
                'required',
                'string'
            ],
            'last_name' => [
                'required',
                'string'
            ],
            'phone' => [
                'required',
                'numeric',
                'digits:10'
            ],
            'email' => [
                'required',
                'email'
            ],
            'message' => [
                'nullable',
                'string'
            ],
            'accept_terms' => [
                'required',
                'string',
                'in:Yes,No'
            ]
        ];
    }
}
