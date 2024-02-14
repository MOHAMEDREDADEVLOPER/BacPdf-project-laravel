<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidRequest extends FormRequest
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
            'name' => 'required|between:4,20',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
