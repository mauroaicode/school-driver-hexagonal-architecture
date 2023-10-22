<?php

namespace Core\BoundedContext\Tenant\Auth\Application\Actions;

use Core\BoundedContext\Tenant\Auth\Infrastructure\Persistence\AuthRepository;

class LogoutUser
{
    public function __construct(private AuthRepository $authRepository){}

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
