<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_recipes', function (Blueprint $table) {
            $table->id();
            $table->string('recipe_name');
            $table->integer('fog1_duration');
            $table->integer('fog1_on_minutes');
            $table->integer('fog1_off_minutes');
            $table->time('fog1_start_time');
            $table->time('fog1_end_time');
            $table->integer('fog2_duration');
            $table->integer('fog2_on_minutes');
            $table->integer('fog2_off_minutes');
            $table->time('fog2_start_time');
            $table->time('fog2_end_time');
            $table->integer('light1_red');
            $table->integer('light1_blue');
            $table->integer('light1_green');
            $table->integer('light1_white');
            $table->integer('light1_bright');
            $table->time('light1_start_time');
            $table->time('light1_end_time');
            $table->integer('light2_red');
            $table->integer('light2_blue');
            $table->integer('light2_green');
            $table->integer('light2_white');
            $table->integer('light2_bright');
            $table->time('light2_start_time');
            $table->time('light2_end_time');
            $table->integer('humidity');
            $table->tinyInteger('default');
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
        Schema::dropIfExists('default_recipes');
    }
}
