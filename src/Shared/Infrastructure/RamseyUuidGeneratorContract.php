<?php

namespace Core\Shared\Infrastructure;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Core\Shared\Domain\Contracts\UuidGeneratorContract;


final class RamseyUuidGeneratorContract implements UuidGeneratorContract {
    public function generate(): string {
        return RamseyUuid::uuid4()->toString();
    }
}
