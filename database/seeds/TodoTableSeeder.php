<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo')->insert([
            'title' => str_random(10),
            'note' => str_random(10),
            'user_id' => 1,
        ]);
    }
}
