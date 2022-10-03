<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->truncate();

        $userRecord = [
            ["name" => "User 1", "email" => "user1@user.com", "status" => "1", "password" => '$2y$10$mO8fbFJGrm/WCTeHybRlA.G2qVzjjuh8K8v35NzZ4mX3ZE5rZryPi']
        ];

        // DB::table('users')->insert($userRecord);

        foreach ($userRecord as $key => $record)
        {
            User::create($record);
        }
    }
}
