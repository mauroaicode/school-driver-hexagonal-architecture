<?php

namespace Core\Shared\Domain\Contracts;

interface  DomainTransactionInterface
{
    public function beginTransaction(): void;

    public function commit(): void;

    public function rollback(): void;
}
