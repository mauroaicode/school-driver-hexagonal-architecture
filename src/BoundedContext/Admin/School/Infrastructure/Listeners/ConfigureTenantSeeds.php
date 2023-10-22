<?php

namespace Core\BoundedContext\Admin\School\Infrastructure\Listeners;

use Core\BoundedContext\Tenant\GenderIdentity\Infrastructure\Persistence\Eloquent\GenderIdentityModelSeed;
use Core\BoundedContext\Tenant\IdentificationType\Infrastructure\Persistence\Eloquent\IdentificationTypeModelSeed;
use Core\BoundedContext\Tenant\User\Infrastructure\Persistence\Eloquent\UserModelSeed;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;

class ConfigureTenantSeeds
{
    public function handle(ConfigureSeeds $event): void
    {
        $event->seed(GenderIdentityModelSeed::class);
        $event->seed(IdentificationTypeModelSeed::class);
        $event->seed(UserModelSeed::class);
    }
}
