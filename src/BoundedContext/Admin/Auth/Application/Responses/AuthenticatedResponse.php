<?php

namespace Core\BoundedContext\Admin\Auth\Application\Responses;

use Core\BoundedContext\Admin\Auth\Domain\Authenticated;

final class AuthenticatedResponse
{
    public function __construct(
        private string $token,
        private string $id,
        private string $email,
    )
    {
    }

    /**
     * Creates an instance of AuthenticatedResponse from an Authenticated object.
     *
     * @param Authenticated $authenticated Object containing authentication information.
     *
     * @return AuthenticatedResponse Instance of AuthenticatedResponse created from the Authenticated object.
     */
    public static function fromAuthenticated(Authenticated $authenticated): self
    {
        return new self(
            token: $authenticated->token()->value(),
            id: $authenticated->id()->value(),
            email: $authenticated->email()->value()
        );
    }

    /**
     * Gets the authentication token.
     *
     * @return string Authentication token.
     */
    public function token(): string
    {
        return $this->token;
    }

    /**
     * Gets the authentication ID.
     *
     * @return string Authentication ID.
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * Gets the e-mail address.
     *
     * @return string E-mail address.
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * Converts the response into an associative array for representation.
     *
     * @return array Associative array representing the response.
     */
    public function toArray(): array
    {
        return [
            'token' => $this->token,
            'user' => (object)[
                'id' => $this->id,
                'email' => $this->email
            ]
        ];
    }
}
