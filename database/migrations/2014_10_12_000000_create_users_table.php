<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->string('company_name', 64)->nullable();
            $table->string('logo', 128)->nullable();
            $table->string('email', 64)->unique();
            $table->string('phone', 64)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 128);
            $table->tinyInteger('role')->default('4')->comment('1=Admin, 2=Car Owner, 3=Employee, 4=Users');
            $table->string('address', 256)->nullable();
            $table->tinyInteger('status')->default('1')->comment('1=Active, 2=Inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
