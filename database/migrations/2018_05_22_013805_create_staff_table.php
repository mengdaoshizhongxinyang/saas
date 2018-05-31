<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image_path');
            $table->string('name');
            $table->string('mobile_phone');
            $table->integer('power');
            $table->string('store_id');
            $table->integer('is_login');
            $table->integer('state');
            $table->string('email')->unique();

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
        //
    }
}
