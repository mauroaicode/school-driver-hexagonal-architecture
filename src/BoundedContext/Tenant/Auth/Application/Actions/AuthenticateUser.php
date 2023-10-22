<?php

namespace Core\BoundedContext\Tenant\Auth\Application\Actions;

use Core\BoundedContext\Tenant\Auth\Domain\Exceptions\IncorrectCredentialsException;
use Core\BoundedContext\Tenant\Auth\Infrastructure\Persistence\AuthRepository;
use Exception;

class AuthenticateUser
{

    public function __construct(private AuthRepository $authRepository){}

    /**
     * Performs user authentication using the credentials provided.
     *
     * @param array $credentials The user's credentials for authentication.
     * @return object An object with the authentication token and the authenticated user's data.
     * @throws Exception If an exception occurs during the authentication process.
     */
    public function __invoke(array $credentials): object
    {
        return $this->authRepository->login($credentials);
    }

}
