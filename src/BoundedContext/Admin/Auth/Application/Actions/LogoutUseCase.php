<?php

namespace Core\BoundedContext\Admin\Auth\Application\Actions;

use Core\BoundedContext\Admin\Auth\Infrastructure\Persistence\AuthRepository;

class LogoutUseCase
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
