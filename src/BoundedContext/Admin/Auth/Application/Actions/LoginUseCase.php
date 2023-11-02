<?php

namespace Core\BoundedContext\Admin\Auth\Application\Actions;

use Core\BoundedContext\Admin\Auth\Application\Responses\AuthenticatedResponse;
use Core\BoundedContext\Admin\Auth\Domain\{Authenticated, Credentials, Contracts\AuthRepositoryContract, ValueObjects\AuthEmail, ValueObjects\AuthPassword};


class LoginUseCase
{
    public function __construct(private AuthRepositoryContract $authRepository){}

    /**
     * Performs user authentication using the credentials provided.
     *
     * @param string $email
     * @param string $password
     * @return object An object with the authentication token and the authenticated user's data.
     */
    public function __invoke(string $email, string $password): object
    {
        $email = new AuthEmail($email);
        $password = new AuthPassword($password);

        $credentials = Credentials::signIn($email, $password);

        $response = $this->authRepository->login($credentials);

        $authenticated = Authenticated::generateAuth($response->token(), $response->id(), $response->email());

        return AuthenticatedResponse::fromAuthenticated($authenticated);
    }

}
