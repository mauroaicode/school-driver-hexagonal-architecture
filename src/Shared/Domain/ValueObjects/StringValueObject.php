<?php

declare(strict_types=1);

namespace Core\Shared\Domain\ValueObjects;

abstract class StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
    //Retornamos el valor de string disponible en el BoundedContext
    public function value(): string
    {
        return $this->value;
    }
}
