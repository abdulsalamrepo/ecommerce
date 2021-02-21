<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('addresses')->delete();

        \DB::table('addresses')->insert(array (
            0 =>
            array (
                'id' => 1,
                'area' => '131, Dhanmondi',
                'city' => 'Dhaka',
                'zip' => 1229,
                'user_id' => 1,
                'default' => false


            ),
            1 =>
            array (
                'id' => 2,
                'area' => 'Mirpur 10',
                'city' => 'Dhaka',
                'zip' => 1772,
                'user_id' => 1,
                'default' => false
            ),
            2 =>
            array (
                'id' => 3,
                'area' => 'Mirpur 2',
                'city' => 'Dhaka',
                'zip' => 1223,
                'user_id' => 1,
                'default' => false
            ),
            3 =>
            array (
                'id' => 4,
                'area' => 'Uttora',
                'city' => 'Dhaka',
                'zip' => 1233,
                'user_id' => 1,
                'default' => true
            ),
        ));


    }
}
