<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminDataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('admin_data')->delete();
        
        DB::table('admin_data')->insert(array (
            0 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'adress' => 'Gorgaz, Buxoro Kinoteatri',
                'number' => '+998913105211',
                'instagram' => 'progress_buxara',
                'telegram' => 'progress_buxara',
                'bill' => '620000',
                'finish_billing' => '2024-02-03',
            ),
            1 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'adress' => 'Navoiy Maktab, Голубые купала',
                'number' => '+99896552112',
                'instagram' => 'prounity.uz',
                'telegram' => 'prounity.uz',
                'bill' => '620000',
                'finish_billing' => '2024-02-01',
            ),
        ));
        
        
    }
}