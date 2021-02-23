<?php

use Illuminate\Database\Seeder;

class WineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Wine::class, 10)->create(); //
    }
}
