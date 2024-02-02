<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('groups')->delete();
        DB::table('groups')->insert(array(
            0 =>
            array(
                'id' => 1,
                'teacher_id' => 6,
                'name' => 'GROUP 1',
                'days' => '["1","3","5"]',
                'start_time' => '17:00:00',
                'end_time' => '20:00:00',
                'price' => '300.000',
                'start_group' => '2024-01-01',
                'end_group' => '2024-08-31',
            ),
            1 =>
            array(
                'id' => 3,
                'teacher_id' => 6,
                'name' => 'GROUP 2',
                'days' => '["2","4","6"]',
                'start_time' => '15:00:00',
                'end_time' => '17:00:00',
                'price' => '750.000',
                'start_group' => '2024-03-01',
                'end_group' => '2024-10-01',
            ),
        ));
    }
}
