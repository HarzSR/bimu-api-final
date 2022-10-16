<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_type');
            $table->string('user_location');
            $table->string('user_card_id');
            $table->string('user_phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('begin_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('barcode');
            $table->string('image');
            $table->tinyInteger('status')->default('1');;
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
        Schema::dropIfExists('admins');
    }
}
