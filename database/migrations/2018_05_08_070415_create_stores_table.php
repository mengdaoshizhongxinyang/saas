<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stores', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name',50)->unique();
        $table->string('storeNo',20)->unique();
        $table->integer('createrId');
        $table->string('mobilePhone',20);
        $table->integer('state');
        $table->text('logoPath');
        $table->string('industry',20);
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
