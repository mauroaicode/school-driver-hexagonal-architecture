<?php

namespace Core\BoundedContext\Tenant\Auth\Application\Actions;

use Core\BoundedContext\Tenant\Auth\Infrastructure\Persistence\AuthJwtRepository;

class LogoutUseCase
{
    public function __construct(private AuthJwtRepository $authRepository){}

    /**
     * Logs out the current user.
     *
     * @return string A logout confirmation message.
     */
    public function __invoke(): string
    {
        return $this->authRepository->logout();
    }
}
