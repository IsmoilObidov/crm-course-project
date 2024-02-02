<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'SYSTEM',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'registrator',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'teacher',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'pupil',
            ),
        ));
        
        
    }
}