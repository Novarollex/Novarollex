<?php

use Illuminate\Database\Seeder;

class cat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => 'gena',
        ]);
    }
}
