<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'role_id'=>'1',
            'name' => 'MD.Admin',
            'username' => 'admin',
            'email' => 'admin@blog.com',
            'password' => bcrypt('chocolate'),
        ]);

        DB::table('users')->insert([
            'role_id'=>'2',
            'name' => 'MD.Author',
            'username' => 'author',
            'email' => 'author@blog.com',
            'password' => bcrypt('chocolate'),
        ]);

        DB::table('users')->insert([
            'role_id'=>'3',
            'name' => 'MD.Freelancer',
            'username' => 'freelancer',
            'email' => 'freelancer@blog.com',
            'password' => bcrypt('chocolate'),
        ]);
    }
}
