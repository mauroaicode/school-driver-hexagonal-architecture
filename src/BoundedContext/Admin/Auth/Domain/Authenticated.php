<?php

namespace Core\BoundedContext\Admin\Auth\Domain;

use Core\BoundedContext\Admin\{Auth\Domain\ValueObjects\AuthEmail,
    Auth\Domain\ValueObjects\AuthId,
    Auth\Domain\ValueObjects\AuthToken
};

class Authenticated
{
    public function __construct(
        private AuthToken $token,
        private AuthId    $id,
        private AuthEmail $email
    )
    {
    }

    /**
     * Creates a new Authenticated object from its primitive components.
     *
     * @param string $token Authentication token.
     * @param string $id Authentication ID.
     * @param string $email Email address.
     *
     * @return Authenticated Authenticated object created with the primitive components.
     */
    public static function fromPrimitives(string $token, string $id, string $email): self
    {
        return new self(
            new AuthToken($token),
            new AuthId($id),
            new AuthEmail($email)
        );
    }

    /**
     * Generate an Authenticated object from AuthToken, AuthId and AuthEmail value objects.
     *
     * @param AuthToken $token Value object representing the authentication token.
     * @param AuthId $id Value object representing the authentication ID.
     * @param AuthEmail $email Value object representing the email address.
     *
     * @return Authenticated Authenticated object generated from the value objects.
     */
    public static function generateAuth(AuthToken $token, AuthId $id, AuthEmail $email): Authenticated
    {
        return new self(
            $token,
            $id,
            $email
        );
    }

    /**
     * Gets the authentication token associated with this authentication information.
     *
     * @return AuthToken Value object representing the authentication token.
     */
    public function token(): AuthToken
    {
        return $this->token;
    }

    /**
     * Gets the authentication ID associated with this authentication information.
     *
     * @return AuthId Value object representing the authentication ID.
     */
    public function id(): AuthId
    {
        return $this->id;
    }

    /**
     * Gets the e-mail address associated with this authentication information.
     *
     * @return AuthEmail Value object representing the email address.
     */
    public function email(): AuthEmail
    {
        return $this->email;
    }
}
