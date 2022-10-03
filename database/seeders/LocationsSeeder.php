<?php

namespace Database\Seeders;

use App\Models\Locations;
use Illuminate\Database\Seeder;
use DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('locations')->truncate();

        $locationRecord = [
            ['location_name' => 'Table 1', 'location_latlong' => '', 'being_date' => '2022-08-01 00:00:00', 'end_date' => '2023-08-01 00:00:00', 'status' => '1'],
            ['location_name' => 'Table 2', 'location_latlong' => '', 'being_date' => '2022-08-01 00:00:00', 'end_date' => '2023-08-01 00:00:00', 'status' => '1'],
            ['location_name' => 'Table 3', 'location_latlong' => '', 'being_date' => '2022-08-01 00:00:00', 'end_date' => '2023-08-01 00:00:00', 'status' => '1'],
        ];

        // DB::table('locations')->insert($locationRecord);

        foreach ($locationRecord as $key => $record) {
            Locations::create($record);
        }
    }
}
