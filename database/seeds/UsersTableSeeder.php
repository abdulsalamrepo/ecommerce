<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@examle.com',
                'password' => Hash::make('12345'),
                'prev_password' => NULL,
                'day' => '10',
                'month' => '4',
                'year' => '1996',
                'gender' => 'male',
                'phone' => '01711001133',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            1 =>
            array (
                'id' => 2,
                'first_name' => 'Shakib',
                'last_name' => 'Mostahid',
                'email' => 'b@gmail.com',
                'password' => Hash::make('12345'),
                'prev_password' => NULL,
                'day' => '10',
                'month' => '4',
                'year' => '1996',
                'gender' => 'male',
                'phone' => '01922991100',
                'created_at' => '2019-02-11',
                'updated_at' => '2019-02-11',
            ),
            2 =>
            array (
                'id' => 3,
                'first_name' => 'Nishat',
                'last_name' => 'Ashraf',
                'email' => 'c@gmail.com',
                'password' => Hash::make('12345'),
                'prev_password' => NULL,
                'day' => '10',
                'month' => '4',
                'year' => '1996',
                'gender' => 'male',
                'phone' => '01899001144',
                'created_at' => '2019-02-11',
                'updated_at' => '2019-02-11',
            ),
            3 =>
            array (
                'id' => 4,
                'first_name' => 'Ayomi',
                'last_name' => 'Hridy',
                'email' => 'd@gmail.com',
                'password' => Hash::make('12345'),
                'prev_password' => NULL,
                'day' => '10',
                'month' => '4',
                'year' => '1996',
                'gender' => 'male',
                'phone' => '0111111111',
                'created_at' => '2019-02-11',
                'updated_at' => '2019-02-11',
            ),
        ));


    }
}
