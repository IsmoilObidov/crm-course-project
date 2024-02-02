<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('subjects')->delete();
        
        DB::table('subjects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Matematika',
                'img' => 'course/mathematics-logo-vector-15608148.jpg',
                'general' => '',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ona Tili',
                'img' => 'course/4590394c50a1593a5a9d615b2bcd6d60.jpg',
                'general' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Tarix',
                'img' => 'course/images.jpg',
                'general' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Huquqshunoslik',
                'img' => 'course/huquqshunoslik.jpg',
                'general' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Fizika',
                'img' => 'course/fizika.jpg',
                'general' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Ingliz Tili',
                'img' => 'course/english.jpg',
                'general' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Rus Tili',
                'img' => 'course/rus-tili.jpg',
                'general' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Kimyo',
                'img' => 'course/kimyo.png',
                'general' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Biologiya',
                'img' => 'course/bioligiya.jpg',
                'general' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Chizmachilik',
                'img' => 'course/chizmachilik.jpg',
                'general' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Iqtisod',
                'img' => 'course/iqtisod.jpg',
                'general' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Bugalteriya',
                'img' => 'course/',
                'general' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'IT texnologiyalar',
                'img' => 'course/',
                'general' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Robototexnika',
                'img' => 'course/',
                'general' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'SMM',
                'img' => 'course/',
                'general' => NULL,
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Mobilografiya',
                'img' => 'course/',
                'general' => NULL,
            ),
            16 => 
            array (
                'id' => 18,
                'name' => '3D Dizayn',
                'img' => 'course/',
                'general' => NULL,
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Photoshop',
                'img' => 'course/',
                'general' => NULL,
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'Figma',
                'img' => 'course/',
                'general' => NULL,
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Geografiya',
                'img' => 'course/',
                'general' => NULL,
            ),
        ));
        
        
    }
}