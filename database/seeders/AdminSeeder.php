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
            ["name" => "Admin 1", "type" => "admin", "mobile" => "1234567890", "email" => "admin1@admin.com", "image" => "", "status" => "1", "password" => '$2y$10$c/wQvMiX49/KVGcPO4tm0OShJKBCAM7noLjCa6gnMSZqfZPowVJ7y']
        ];

        // DB::table('users')->insert($userRecord);

        foreach ($adminRecord as $key => $record)
        {
            Admin::create($record);
        }
    }
}
