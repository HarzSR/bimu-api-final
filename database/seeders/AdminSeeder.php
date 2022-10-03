<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('admins')->truncate();

        $adminRecord = [
            ["name" => "Admin 1", "type" => "admin", "mobile" => "1234567890", "email" => "admin1@admin.com", "image" => "", "status" => "1", "password" => '$2y$10$mO8fbFJGrm/WCTeHybRlA.G2qVzjjuh8K8v35NzZ4mX3ZE5rZryPi']
        ];

        // DB::table('users')->insert($userRecord);

        foreach ($adminRecord as $key => $record)
        {
            Admin::create($record);
        }
    }
}
