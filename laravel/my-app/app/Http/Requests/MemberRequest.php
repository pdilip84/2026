<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MemberRequest extends FormRequest
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
        $memberId = $this->route('member') ? $this->route('member')->id : null;
        return [
            'name' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                'max:50',
                Rule::unique('members', 'email')->ignore($memberId),
            ],
            'phone' => [
                'required',
                'string',
                'max:30',
                Rule::unique('members', 'phone')->ignore($memberId),
            ],
            'status' => 'required|in:active,inactive',
            'note' => 'nullable|string',
        ];
    }
}
