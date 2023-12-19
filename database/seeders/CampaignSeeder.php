<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign')->insert([
            [
                'status' => 'Đợi Duyệt',
               
            ],
            [
                'status' => 'Đã Duyệt',
            ],
            [
                'status' => 'Đã Hủy',
            ],
          
        ]);
    }
}
