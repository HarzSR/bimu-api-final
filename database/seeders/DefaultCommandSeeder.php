<?php

namespace Database\Seeders;

use App\Models\DefaultCommand;
use Illuminate\Database\Seeder;
use DB;


class DefaultCommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('default_commands')->truncate();

        $commandRecord = [
            ["command" => "clean-bimu","status" => "1"],
            ["command" => "start-bimu","status" => "1"]
        ];

        foreach ($commandRecord as $key => $record)
        {
            DefaultCommand::create($record);
        }
    }
}
