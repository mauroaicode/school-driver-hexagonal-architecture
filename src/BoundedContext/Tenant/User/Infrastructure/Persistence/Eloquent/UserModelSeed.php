<?php

namespace Core\BoundedContext\Tenant\User\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserModelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=============================================
             CREAMOS GÉNEROS
         =============================================*/
        UserModel::factory()->count(1)->create([
            'name' => 'Fernando',
            'last_name' => 'Puchana',
            'email' => 'fernando@aciudadablanca.com',
            'slug' => Str::slug(strtolower('Fernando') . '-' . strtolower('Puchana') . '-' . Str::random(10), '-'),
        ]);

    }
}
