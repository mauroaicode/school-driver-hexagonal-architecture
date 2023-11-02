<?php

namespace Core\BoundedContext\Tenant\Auth\Domain\Contracts;

use Core\BoundedContext\Tenant\Auth\Domain\Credentials;

interface AuthRepositoryContract
{
    public function login(Credentials $credentials): object;

    public function logout(): string;
}
