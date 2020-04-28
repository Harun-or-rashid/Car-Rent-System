<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_owner_id');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name', 128)->nullable();
            $table->string('email', 128)->nullable();
            $table->string('phone', 64)->nullable();
            $table->string('pickup_location', 256)->nullable();
            $table->tinyInteger('order_status')->default('1')->comment('1=pending, 2= running, 3=completed, 0=canceled');
            $table->decimal('total_distance')->nullable();
            $table->decimal('total_price')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();

            $table->foreign('car_owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_requests');
    }
}
