<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('car_no', 64)->nullable()->comment('car no');
            $table->string('car_name', 128)->comment('car name');
            $table->unsignedInteger('user_id')->comment('car owner id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('car_type_id');
            $table->integer('num_of_sits')->default('4');
            $table->decimal('price_per_km');
            $table->string('image', 128)->nullable();
            $table->text('car_details')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1=active, 0=inactive');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('car_type_id')->references('id')->on('car_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
