<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('tag_id')->nullable();
            $table->string('tag_uid')->nullable();
            $table->string('user_id')->nullable();
            $table->string('tag_name')->nullable();
            $table->string('tag_mac_id')->nullable();
            $table->string('tag_rssi')->nullable();
            $table->string('barcode')->nullable();
            $table->string('alarm')->default('0');
            $table->dateTime('being_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('tags');
    }
}
