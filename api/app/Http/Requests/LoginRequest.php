<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * An extra guard to check if user is not authenticated
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return !auth('sanctum')->check();
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }
}
