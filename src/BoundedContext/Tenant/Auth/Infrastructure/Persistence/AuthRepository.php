<?php

namespace Core\BoundedContext\Tenant\Auth\Infrastructure\Persistence;

use Core\BoundedContext\Tenant\Auth\Domain\{Contracts\AuthRepositoryContract, Exceptions\IncorrectCredentialsException};
use Core\Shared\Domain\Contracts\AuthContract;
use Illuminate\Http\Response;


class AuthRepository implements AuthRepositoryContract
{
    const TYPE_AUTH = 'tenant';

    public function __construct(
        private AuthContract $authContract
    ){}

    /**
     * Performs the login process and generates an authentication token.
     *
     * @param array $credentials The user's credentials for authentication.
     * @return object An object with the authentication token and the authenticated user's data.
     * @throws IncorrectCredentialsException If the credentials are incorrect, an exception is thrown.
     */
    public function login(array $credentials): object
    {
        $isAuthenticated = $this->authContract->authenticate($credentials, self::TYPE_AUTH);

        if (!$isAuthenticated) {
            throw new IncorrectCredentialsException('', Response::HTTP_UNAUTHORIZED);
        }

        $token = $this->authContract->generateToken(self::TYPE_AUTH);

        $authUser = $this->authContract->getAuthenticatedUser(self::TYPE_AUTH);

        return (object)[
            'token' => $token,
            'user' => $authUser
        ];
    }

    /**
     * Logs the user out and returns a confirmation message.
     *
     * @return string Logout confirmation message.
     */
    public function logout(): string
    {
        $this->authContract->logout(self::TYPE_AUTH);
        return 'Ha cerrado sesión';
    }
}
