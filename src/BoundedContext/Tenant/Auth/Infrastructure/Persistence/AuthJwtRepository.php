<?php

namespace Core\BoundedContext\Tenant\Auth\Infrastructure\Persistence;

use Illuminate\Http\Response;
use Core\Shared\Domain\Contracts\AuthContract;
use Core\BoundedContext\Tenant\Auth\Domain\{Authenticated,
    Credentials,
    Contracts\AuthRepositoryContract,
    Exceptions\IncorrectCredentialsException,
};


class AuthJwtRepository implements AuthRepositoryContract
{
    const TYPE_AUTH = 'tenant';

    public function __construct(private AuthContract $authContract){}

    /**
     * Performs the login process and generates an authentication token.
     *
     * @param Credentials $credentials
     * @return Authenticated An object with the authentication token and the authenticated user's data.
     * @throws IncorrectCredentialsException If the credentials are incorrect, an exception is thrown.
     */
    public function login(Credentials $credentials): Authenticated
    {
        $credentials = [
            'email' => $credentials->email()->value(),
            'password' => $credentials->password()->value()
        ];

        $isAuthenticated = $this->authContract->authenticate($credentials, self::TYPE_AUTH);

        if (!$isAuthenticated) {
            throw new IncorrectCredentialsException('', Response::HTTP_UNAUTHORIZED);
        }

        $token = $this->authContract->generateToken(self::TYPE_AUTH);

        $user = $this->authContract->getAuthenticatedUser(self::TYPE_AUTH);

        return Authenticated::fromPrimitives($token, $user->id, $user->email);
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
