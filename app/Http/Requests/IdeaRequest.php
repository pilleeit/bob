<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class IdeaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // saab kontrollida kas kasutajal on õigus üldse seda toimingut teha
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['required', 'min:10'],
        ];
    }

    // #[Override]
    public function messages(): array
    {
        return [
            'description.required' => 'Common dude .... gimme something for :attribute',
        ];
    }
}
