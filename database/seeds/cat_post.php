<?php

use Illuminate\Database\Seeder;

class cat_post extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_post')->insert([
            'post_id' => 1,
            'category_id' => 1,
        ]);
    }
}
