<?php

namespace Database\Seeders;

use App\Models\Logs;
use Illuminate\Database\Seeder;
use DB;

class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('logs')->truncate();

        $logRecord = [
            ['user_id' => '1', 'tag_id' => '1', 'status' => '1'],
            ['user_id' => '1', 'tag_id' => '2', 'status' => '1'],
            ['user_id' => '1', 'tag_id' => '3', 'status' => '1'],
        ];

        // DB::table('logs')->insert($logRecord);

        foreach ($logRecord as $key => $record) {
            Logs::create($record);
        }
    }
}
