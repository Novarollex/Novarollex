<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'title' => 'Мясо',
            'descr' => 'Мясо меж двух булок, с капустой, помидорами и сыром.',
            'price' => '1000',
            'img' => '/images/meat.jpg',
        ]);
    }
}
