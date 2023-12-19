<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_name' => 'admin',
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'telephone' => '0335780470',
                'role' => '1',
                'avatar' => 'public/img/logo/Nghi-H1.png'
            ],
            [
                'user_name' => 'Anh',
                'first_name' => 'Anh',
                'last_name' => 'Nguyễn',
                'email' => 'mathetesnghi@gmail.com',
                'password' => bcrypt('123456'),
                'telephone' => '0335780470',
                'role' => '2',
                'avatar' => 'public/img/logo/Nghi-H1.png'
            ],
            [
                'user_name' => 'Anh12',
                'first_name' => 'Anh12',
                'last_name' => 'Nguyễn',
                'email' => 'anh@gmail.com',
                'password' => bcrypt('123456'),
                'telephone' => '0335780470',
                'role' => '3',
                'avatar' => 'public/img/logo/Nghi-H1.png'
            ],
        ]);
    }
}
