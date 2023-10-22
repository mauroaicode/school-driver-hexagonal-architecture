<?php

namespace Core\BoundedContext\Tenant\Auth\Infrastructure\FormRequest;

use Core\Shared\Infrastructure\FormRequest\AppBaseFormRequest;

class AuthRequest extends AppBaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Defines the validation rules for the authentication request.
     *
     * @return array An array containing the validation rules for the request fields.
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
