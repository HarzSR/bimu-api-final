<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->string('device_mac');
            $table->float('temperature');
            $table->float('humidity');
            $table->float('light');
            $table->float('temperature_probe');
            $table->float('water_level');
            $table->float('ec_probe');
            $table->float('ph_probe');
            $table->datetime('device_rtc');
            $table->string('crc');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('inputs');
    }
}
