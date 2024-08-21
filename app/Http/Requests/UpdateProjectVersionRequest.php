<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectVersionRequest extends FormRequest
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
            'block_editor_data' => 'required|string',
            'success_editor_data' => 'required|string',
            'color_theme' => 'required|string',
            'header_font' => 'nullable|string',
            'text_font' => 'nullable|string',
            'name_font' => 'nullable|string',
        ];
    }
}
