<?php

namespace Database\Seeders;

use App\Models\DefaultRecipe;
use Illuminate\Database\Seeder;
use DB;

class DefaultRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('default_recipes')->truncate();

        $recipeRecord = [
            ["recipe_name" => "Test 1","fog1_duration" => "10","fog1_on_minutes" => "1","fog1_off_minutes" => "9","fog1_start_time" => "09:00:00","fog1_end_time" => "10:00:00","fog2_duration" => "10","fog2_on_minutes" => "2","fog2_off_minutes" => "8","fog2_start_time" => "13:00:00","fog2_end_time" => "14:00:00","light1_red" => "100","light1_blue" => "0","light1_green" => "0","light1_white" => "0","light1_bright" => "100","light1_start_time" => "11:00:00","light1_end_time" => "12:00:00","light2_red" => "50","light2_blue" => "0","light2_green" => "0","light2_white" => "0","light2_bright" => "50","light2_start_time" => "16:00:00","light2_end_time" => "17:00:00","humidity" => "50","default" => "1"],
            ["recipe_name" => "Test 2","fog1_duration" => "10","fog1_on_minutes" => "1","fog1_off_minutes" => "9","fog1_start_time" => "09:00:00","fog1_end_time" => "10:00:00","fog2_duration" => "10","fog2_on_minutes" => "2","fog2_off_minutes" => "8","fog2_start_time" => "13:00:00","fog2_end_time" => "14:00:00","light1_red" => "100","light1_blue" => "0","light1_green" => "0","light1_white" => "0","light1_bright" => "100","light1_start_time" => "11:00:00","light1_end_time" => "12:00:00","light2_red" => "50","light2_blue" => "0","light2_green" => "0","light2_white" => "0","light2_bright" => "50","light2_start_time" => "16:00:00","light2_end_time" => "17:00:00","humidity" => "50","default" => "1"],
            ["recipe_name" => "Test 3","fog1_duration" => "10","fog1_on_minutes" => "1","fog1_off_minutes" => "9","fog1_start_time" => "09:00:00","fog1_end_time" => "10:00:00","fog2_duration" => "10","fog2_on_minutes" => "2","fog2_off_minutes" => "8","fog2_start_time" => "13:00:00","fog2_end_time" => "14:00:00","light1_red" => "100","light1_blue" => "0","light1_green" => "0","light1_white" => "0","light1_bright" => "100","light1_start_time" => "11:00:00","light1_end_time" => "12:00:00","light2_red" => "50","light2_blue" => "0","light2_green" => "0","light2_white" => "0","light2_bright" => "50","light2_start_time" => "16:00:00","light2_end_time" => "17:00:00","humidity" => "50","default" => "1"],
            ["recipe_name" => "Test 4","fog1_duration" => "10","fog1_on_minutes" => "1","fog1_off_minutes" => "9","fog1_start_time" => "09:00:00","fog1_end_time" => "10:00:00","fog2_duration" => "10","fog2_on_minutes" => "2","fog2_off_minutes" => "8","fog2_start_time" => "13:00:00","fog2_end_time" => "14:00:00","light1_red" => "100","light1_blue" => "0","light1_green" => "0","light1_white" => "0","light1_bright" => "100","light1_start_time" => "11:00:00","light1_end_time" => "12:00:00","light2_red" => "50","light2_blue" => "0","light2_green" => "0","light2_white" => "0","light2_bright" => "50","light2_start_time" => "16:00:00","light2_end_time" => "17:00:00","humidity" => "50","default" => "1"],
        ];

        foreach ($recipeRecord as $key => $record)
        {
            DefaultRecipe::create($record);
        }
    }
}
