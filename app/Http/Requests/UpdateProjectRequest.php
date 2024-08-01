<?php

namespace App\Http\Requests;

use App\Models\Project;
use App\Policies\ProjectPolicy;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                'min:5',
                Rule::unique('projects')->ignore($request->route('project')),
                Rule::notIn(['www', 'admin', 'dashboard', 'cdn']),
            ],
            'redirect_after_submission' => 'integer',
            'redirect_to_after_submission' => 'nullable|url:https|required_if_accepted:redirect_after_submission',
            'custom_domain' => [
                'nullable',
                'string',
                Rule::unique('projects')->ignore($request->route('project')),
            ],
        ];
    }
}
