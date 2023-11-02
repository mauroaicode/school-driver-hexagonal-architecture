<?php

namespace Core\BoundedContext\Tenant\Auth\Application\Actions;

use Core\BoundedContext\Tenant\Auth\Application\Responses\AuthenticatedResponse;
use Core\BoundedContext\Tenant\Auth\Domain\ValueObjects\{AuthEmail, AuthPassword};
use Core\BoundedContext\Tenant\Auth\Domain\{Authenticated, Credentials, Contracts\AuthRepositoryContract};

final class LoginUseCase
{

    public function __construct(private AuthRepositoryContract $authRepository){}

    /**
     * Performs user authentication using the credentials provided.
     *
     * @param string $email
     * @param string $password
     * @return AuthenticatedResponse An object with the authentication token and the authenticated user's data.
     */
    public function __invoke(string $email, string $password): AuthenticatedResponse
    {
        $email = new AuthEmail($email);
        $password = new AuthPassword($password);

        $credentials = Credentials::signIn($email, $password);

        $response = $this->authRepository->login($credentials);

        $authenticated = Authenticated::generateAuth($response->token(), $response->id(), $response->email());

        return AuthenticatedResponse::fromAuthenticated($authenticated);
    }

}
