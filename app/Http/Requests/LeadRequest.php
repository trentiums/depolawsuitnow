<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
            'firstname' => [
                'required',
                'string'
            ],
            'lastname' => [
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
            'zip' => [
                'required',
                'string'
            ],
            'trusted_form_cert_id' => [
                'required',
                'string'
            ],
            'trusted_form_cert_url' => [
                'required',
                'string'
            ],
            'AffiliateReferenceID' => [
                'required',
                'string'
            ]
        ];
    }
}
