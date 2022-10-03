<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;
use DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('tags')->truncate();

        $tagRecord = [
            ['user_id' => '1', 'tag_name' => 'Tool 1', 'tag_mac_id' => 'E0:0E:4A:64:16:24', 'tag_rssi' => '-75', 'being_date' => '2022-08-01 00:00:00', 'end_date' => '2023-08-01 00:00:00', 'status' => '1'],
            ['user_id' => '1', 'tag_name' => 'Tool 2', 'tag_mac_id' => 'E0:0E:4A:64:16:25', 'tag_rssi' => '-76', 'being_date' => '2022-08-01 00:00:00', 'end_date' => '2023-08-01 00:00:00', 'status' => '1'],
            ['user_id' => '1', 'tag_name' => 'Tool 3', 'tag_mac_id' => 'E0:0E:4A:64:16:26', 'tag_rssi' => '-77', 'being_date' => '2022-08-01 00:00:00', 'end_date' => '2023-08-01 00:00:00', 'status' => '1'],
        ];

        // DB::table('tags')->insert($tagRecord);

        foreach ($tagRecord as $key => $record) {
            Tags::create($record);
        }
    }
}
