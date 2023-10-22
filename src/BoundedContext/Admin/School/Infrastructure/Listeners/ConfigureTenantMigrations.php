<?php

namespace Core\BoundedContext\Admin\School\Infrastructure\Listeners;

use Tenancy\Hooks\Migration\Events\ConfigureMigrations;
use Tenancy\Tenant\Events\Created;
use Tenancy\Tenant\Events\Deleted;
use Tenancy\Tenant\Events\Updated;

class ConfigureTenantMigrations
{
    public function handle(ConfigureMigrations $event)
    {
        $event->path(base_path("src/BoundedContext/Tenant/**/Infrastructure/migrations"));
    }
}
