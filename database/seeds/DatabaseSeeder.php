<?php

use Carbon\Carbon;
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
        $user_id = DB::table('users')->insertGetId([
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
        DB::table('users')->insert([
            'first_name' => 'Laura',
            'last_name' => 'Harris',
            'email' => 'laura.harris@davenport.edu',
            'password' => Hash::make('miasm2020'),
            'administrator_ind' => 1,
        ]);
        $event_id = DB::table('events')->insertGetId([
            'name' => 'MI-ASM Annual Meeting',
            'event_date' => Carbon::create('2020', '3', '28'),
            'description' => 'The 2020 MI-ASM Annual Meeting will be held in Detroit this year.',
        ]);
        $event_user_id = DB::table('event_user')->insertGetId([
            'event_id' => $event_id,
            'user_id' => $user_id,
            'registration_date ' => Carbon::create('2020', '3', '10'),
        ]);
        DB::table('event_user_abstract')->insert([
            'event_user_id' => $event_user_id,
            'title' => 'Test Abstract Title',
            'authors' => 'Jared Geller and Laura Harris',
            'body' => 'Test abstract body.',
            'submission_date' => Carbon::create('2020', '3', '10'),
            'delivery_preference' => EventUserAbstract::DELIVERY_PREFERENCE_EITHER,
        ]);
    }
}
