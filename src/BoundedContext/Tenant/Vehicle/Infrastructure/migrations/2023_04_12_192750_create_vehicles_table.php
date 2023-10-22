<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Core\BoundedContext\Tenant\Vehicle\Infrastructure\Persistence\Eloquent\VehicleModel;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('brand');
            $table->string('model');
            $table->string('badge');
            $table->uuid('create_user_id');
            $table->foreign('create_user_id')->references('id')->on('users');
            $table->enum('state', [
                VehicleModel::AVAILABLE,
                VehicleModel::NOT_AVAILABLE
            ])->default(VehicleModel::AVAILABLE);
            $table->enum('type', [
                VehicleModel::CAR,
                VehicleModel::MOTORCYCLE,
                VehicleModel::TRUCK
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
