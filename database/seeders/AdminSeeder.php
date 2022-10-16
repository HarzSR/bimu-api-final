<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

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
            ["user_name" => "Admin 1", "user_type" => "admin", "user_location" => "1" , "user_card_id" => "03f6ba18" , "user_phone" => "1234567890", "email" => "admin1@admin.com", "begin_date" => Carbon::create() , "end_date" => Carbon::create() , "barcode" => "EMP_ELEX_001" , "image" => "", "status" => "1", "password" => '$2y$10$c/wQvMiX49/KVGcPO4tm0OShJKBCAM7noLjCa6gnMSZqfZPowVJ7y'],
            ["user_name" => "User 1", "user_type" => "user", "user_location" => "1" , "user_card_id" => "03f6ba18" , "user_phone" => "1234567890", "email" => "user1@user.com", "begin_date" => Carbon::create() , "end_date" => Carbon::create() , "barcode" => "EMP_ELEX_002" , "image" => "", "status" => "1", "password" => '$2y$10$c/wQvMiX49/KVGcPO4tm0OShJKBCAM7noLjCa6gnMSZqfZPowVJ7y'],
            ["user_name" => "User 2", "user_type" => "user", "user_location" => "1" , "user_card_id" => "03f6ba18" , "user_phone" => "1234567890", "email" => "user2@user.com", "begin_date" => Carbon::create() , "end_date" => Carbon::create() , "barcode" => "EMP_ELEX_003" , "image" => "", "status" => "1", "password" => '$2y$10$c/wQvMiX49/KVGcPO4tm0OShJKBCAM7noLjCa6gnMSZqfZPowVJ7y'],
        ];

        // DB::table('users')->insert($userRecord);

        foreach ($adminRecord as $key => $record)
        {
            Admin::create($record);
        }
    }
}
