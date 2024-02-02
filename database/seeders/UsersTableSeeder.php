<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();
        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'role_id' => 1,
                'course_id' => NULL,
                'subject_id' => NULL,
                'name' => 'SYSTEM',
                'email' => '-',
                'photo' => '-',
                'email_verified_at' => NULL,
                'password' => Hash::make('admin'),
                'is_blocked' => 0,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 3,
                'role_id' => 2,
                'course_id' => NULL,
                'subject_id' => NULL,
                'name' => 'Progress',
                'email' => 'progress@gmail.com',
                'photo' => 'storage/admin/WrO9SHZhS1P3v9yu7AIPE9V09oF0G0xgxxyLo6DO.jpg',
                'email_verified_at' => NULL,
                'password' => Hash::make('reteryut10'),
                'is_blocked' => 0,
                'remember_token' => NULL,
                'created_at' => '2024-01-15 12:36:05',
                'updated_at' => '2024-01-15 12:36:05',
            ),
            2 =>
            array(
                'id' => 4,
                'role_id' => 2,
                'course_id' => NULL,
                'subject_id' => NULL,
                'name' => 'ProUnity',
                'email' => 'ozodbekochilov449@gmail.com',
                'photo' => 'storage/admin/659FJqG21Dg9Tl5muq5lcrqxRFioGGTnQkOOayRO.jpg',
                'email_verified_at' => NULL,
                'password' => Hash::make('reteryut10'),
                'is_blocked' => 0,
                'remember_token' => NULL,
                'created_at' => '2024-01-15 12:36:22',
                'updated_at' => '2024-01-15 12:36:22',
            ),
            3 =>
            array(
                'id' => 5,
                'role_id' => 3,
                'course_id' => 3,
                'subject_id' => NULL,
                'name' => 'Murod',
                'email' => 'ismoilobi123@gmail.com',
                'photo' => 'storage/staff/gsTyJgRgekkqnFsvIutIjFo7Go64iSfObwR7rFAQ.png',
                'email_verified_at' => NULL,
                'password' => Hash::make('reteryut10'),
                'is_blocked' => 0,
                'remember_token' => NULL,
                'created_at' => '2024-01-15 12:37:28',
                'updated_at' => '2024-01-15 12:37:28',
            ),
            4 =>
            array(
                'id' => 6,
                'role_id' => 4,
                'course_id' => 3,
                'subject_id' => 1,
                'name' => 'Ismoil',
                'email' => 'rasidv5411@gmail.com',
                'photo' => 'storage/staff/w9823pLEzH2Vtx3NceZIaJSrVGXEIf6r3sxxE000.jpg',
                'email_verified_at' => NULL,
                'password' => Hash::make('reteryut10'),
                'is_blocked' => 0,
                'remember_token' => NULL,
                'created_at' => '2024-01-15 12:37:52',
                'updated_at' => '2024-01-15 12:37:52',
            ),
            5 =>
            array(
                'id' => 7,
                'role_id' => 4,
                'course_id' => 3,
                'subject_id' => 5,
                'name' => 'Mirfayz',
                'email' => 'ozodbekochilov111449@gmail.com',
                'photo' => 'storage/staff/ZgKQ6Qa8FGXJFrouKbSmDIfUuF1GrSCip9SuKBnR.jpg',
                'email_verified_at' => NULL,
                'password' => Hash::make('reteryut10'),
                'is_blocked' => 0,
                'remember_token' => NULL,
                'created_at' => '2024-01-15 12:38:11',
                'updated_at' => '2024-01-15 12:38:11',
            ),
            6 =>
            array(
                'id' => 8,
                'role_id' => 3,
                'course_id' => 4,
                'subject_id' => NULL,
                'name' => 'Sarvinoz',
                'email' => 'rasidv51241@gmail.com',
                'photo' => 'storage/staff/ophXXDCVW368zYwLONZaNbgumjMo1Zz0z9sjDFt5.png',
                'email_verified_at' => NULL,
                'password' => Hash::make('reteryut10'),
                'is_blocked' => 0,
                'remember_token' => NULL,
                'created_at' => '2024-01-15 12:38:45',
                'updated_at' => '2024-01-15 12:38:45',
            ),
            7 =>
            array(
                'id' => 9,
                'role_id' => 4,
                'course_id' => 4,
                'subject_id' => 9,
                'name' => 'Abbos',
                'email' => '123123@gan.com',
                'photo' => 'storage/staff/tWAxhxMjHHl8PWiylYNa8ahEj6JUtC4e0nKfxAJB.jpg',
                'email_verified_at' => NULL,
                'password' => Hash::make('reteryut10'),
                'is_blocked' => 0,
                'remember_token' => NULL,
                'created_at' => '2024-01-15 12:39:14',
                'updated_at' => '2024-01-15 12:39:14',
            ),
        ));
    }
}
