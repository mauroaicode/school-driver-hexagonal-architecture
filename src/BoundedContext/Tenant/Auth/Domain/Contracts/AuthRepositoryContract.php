<?php

namespace Core\BoundedContext\Tenant\Auth\Domain\Contracts;

interface AuthRepositoryContract
{
    public function login(array $credentials): object;

    public function logout(): string;
}
