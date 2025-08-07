<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->route('admin')->id ?? null),
            ],
            'password' => [
                $this->route('admin')?->id ? 'nullable' : 'required',
                'string',
                'min:8',
                $this->route('admin')?->id ? '' : 'confirmed',
            ],
            'role' => ['required', 'string', 'exists:roles,name'],
        ];
    }
}
