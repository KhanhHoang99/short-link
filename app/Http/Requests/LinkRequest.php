<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'original_link' => 'required|url', // Validate as a valid URL
            'short_link' => [
                'required',
                'unique:links',
                function ($attribute, $value, $fail) {
                    // Check if the value is equal to 'links'
                    if ($value === 'links') {
                        $fail($attribute . ' cannot be equal to "links".');
                    }
                },
            ],
            'category_id'  => 'required',
        ];
    }
}
