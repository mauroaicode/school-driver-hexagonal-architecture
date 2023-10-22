<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Tenancy\Identification\Contracts\ResolvesTenants;
use Core\Shared\Domain\Contracts\UuidGeneratorContract;
use Core\Shared\Infrastructure\RamseyUuidGeneratorContract;
use Core\BoundedContext\Admin\School\Infrastructure\Persistence\Eloquent\SchoolModel;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
            $resolver->addModel(SchoolModel::class);
            return $resolver;
        });

        $this->app->bind(
            UuidGeneratorContract::class,
            RamseyUuidGeneratorContract::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Cargar migraciones del BoundedContext
         */
        if (!Request::is('api/*')) {
            $this->loadMigrationsFrom(
                \File::allFiles(base_path("src/BoundedContext/Admin/**/Infrastructure/migrations"))
            );
        }

    }
}
