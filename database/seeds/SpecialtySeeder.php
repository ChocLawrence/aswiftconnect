<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('specialty')->insert([
            'name' => 'developer',
        ]);

        DB::table('specialty')->insert([
            'name' => 'designer',
        ]);

    }
}
