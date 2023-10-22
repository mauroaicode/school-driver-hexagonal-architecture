<?php

namespace Core\BoundedContext\Admin\Auth\Application\Actions;

use Exception;
use Core\BoundedContext\Admin\Auth\Infrastructure\Persistence\AuthRepository;

class LoginUseCase
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
