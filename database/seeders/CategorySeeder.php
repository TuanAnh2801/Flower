<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name_category' => 'Hoa Tet 2023 ',
                'desc' => 'flower-2023',
            ],
            [
                'name_category' => 'Hoa Cuoi ',
                'desc' => 'flower-wedding',
            ],
            [
                'name_category' => 'Hoa Sinh Nhat ',
                'desc' => 'flower-birthday',
            ],
            [
                'name_category' => 'Hoa Khai Truong ',
                'desc' => 'flower-opeing',
            ]
        ]);
    }
}
