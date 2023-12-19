<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoriesposts')->insert([
            [
                'name' => 'Cách hoa bảo quản',
               
            ],
            [
                'name' => 'Sắp xếp bố trí',
            ],
            [
                'name' => 'Loại hoa phổ biến',
            ],
            [
                'name' => 'Chăm sóc bảo vệ',
            ],
            [
                'name' => 'Mẹo làm tươi',
            ],
            [
                'name' => 'Cắm hoa độc đáo',
            ],

          
        ]);
    }
}
