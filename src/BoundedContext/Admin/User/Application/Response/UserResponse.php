<?php

namespace Core\BoundedContext\Admin\User\Application\Response;

use Core\BoundedContext\Admin\User\Domain\User;

class UserResponse
{
    private string $id;
    private string $email;

    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public static function fromGame(User $user): self
    {
        return new self(
            $user->id()->value(),
            $user->email()->value(),
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }
}
