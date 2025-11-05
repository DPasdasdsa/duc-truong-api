<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleAssignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('trip_id')->default(0)->index();
            $table->integer('vehicle_id')->default(0)->index();
            $table->integer('driver_id')->default(0)->index();
            $table->integer('assistant_id')->default(0)->index();
            $table->enum('status', ['completed', 'in_progress'])->default('in_progress');
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
        Schema::dropIfExists('vehicle_assignments');
    }
}
