<?php

use Illuminate\Database\Seeder;

class MakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Maker::class, 10)->create();//
    }
}
