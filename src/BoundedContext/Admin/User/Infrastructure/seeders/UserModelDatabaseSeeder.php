<?php
namespace Core\BoundedContext\Admin\User\Infrastructure\seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Core\BoundedContext\Admin\User\Infrastructure\Persistence\Eloquent\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserModelDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*=============================================
            CREAMOS UN USUARIO ADMINISTRADOR
        =============================================*/
        $admin = UserModel::factory()->count(1)->create([
            'name' => 'Mauricio',
            'last_name' => 'Gutierrez',
            'email' => 'developer.mauricio2310@gmail.com',
            'slug' => Str::slug(strtolower('Mauricio') . '-' . strtolower('Gutierrez') . '-' . Str::random(10), '-'),
        ]);
    }
}
