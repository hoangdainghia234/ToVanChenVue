<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
            'role' => 0
        ]);

        DB::table('user_profiles')->insert([
            'first_name' => 'Phong',
            'last_name' => 'Jr',
            'address' => 'Duy Son - Duy Xuyen - Quang Nam',
            'user_id' => 1
        ]);
    }
}
