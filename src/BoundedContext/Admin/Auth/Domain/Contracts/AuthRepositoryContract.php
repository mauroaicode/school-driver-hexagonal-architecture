<?php

namespace Core\BoundedContext\Admin\Auth\Domain\Contracts;

interface AuthRepositoryContract
{
    public function login(array $credentials): object;

    public function logout();
}
