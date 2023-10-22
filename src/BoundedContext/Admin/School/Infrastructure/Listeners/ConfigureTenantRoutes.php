<?php

namespace Core\BoundedContext\Admin\School\Infrastructure\Listeners;
use Illuminate\Support\Facades\File;
use Tenancy\Affects\Routes\Events\ConfigureRoutes;

class ConfigureTenantRoutes
{
    public function handle(ConfigureRoutes $event)
    {
        if ($event->event->tenant) {
            $basePath = base_path('src/BoundedContext/Tenant');
            $apiRoutes = File::glob($basePath . '/**/Infrastructure/routes/api.php');

            $event
                ->flush()
                ->fromFile(['prefix' => '{tenant}/api'], $apiRoutes[0]);
        }
    }
}
