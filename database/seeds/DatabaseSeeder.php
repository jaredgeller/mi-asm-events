<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'first_name' => 'Jared',
            'last_name' => 'Geller',
            'email' => 'jgeller@email.davenport.edu',
            'password' => Hash::make('strongestavenger'),
            'administrator_ind' => 1,
        ]);
        DB::table('users')->insert([
            'first_name' => 'Loay',
            'last_name' => 'Alnaji',
            'email' => 'lalnaji@davenport.edu',
            'password' => Hash::make('allthestars'),
            'administrator_ind' => 1,
        ]);
    }
}
