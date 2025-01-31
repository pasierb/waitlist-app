<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                'min:5',
                'unique:projects',
                Rule::notIn(['www', 'admin', 'dashboard', 'cdn']),
            ],
            'description' => 'nullable|string',
            'copy_writer_instructions' => 'nullable|string',
            'ogimage_url' => 'nullable|url:https',
            'logo_url' => 'nullable|url:https',
            'redirect_to_after_submission' => 'nullable|url:https|required_if_accepted:redirect_after_submission',
            'redirect_after_submission' => 'nullable|integer',
            'custom_domain' => [
                'nullable',
                'string',
                'unique:projects',
            ],
        ];
    }
}
