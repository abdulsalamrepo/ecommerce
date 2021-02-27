<?php

use Illuminate\Database\Seeder;

class MarketingSettingSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('market_settings')->delete();

        \DB::table('market_settings')->insert([
            'name' => 'Matshopen Nybro AB',
            'tel'=> '',
            'email'=> '',
            'address'=> 'staionsgatan 4c,382 30 Nybro',
            'language'=> 'sw',
            'currency'=> 'krone',
            'facebook'=> 'http://facebook.com/kh.hayeks',
            'logo'=> 'store2/images/logo/logo-2.png',
            'twitter'=> '',
            'whatsapp'=> 'http://wa.me/0723222486',
            'google'=> '',
            'instagram'=> 'matshopennybro',
            'youtube'=> ''
        ]);


    }
}
