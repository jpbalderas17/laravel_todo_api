<?php

use Illuminate\Database\Seeder;

class TodoItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_items')->insert([
            'action' => str_random(10),
            'done' => 0,
            'todo_id' => 1,
        ]);
    }
}
