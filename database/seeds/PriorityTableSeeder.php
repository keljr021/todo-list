<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
          'name' => 'Urgent',
          'description' => 'Task is critical, must be completed shortly.',
          'created_at' => date('Y-m-d h:i:s'),
          'color'  => '#ffad59',
        ]);

        DB::table('priorities')->insert([
          'name' => 'Important',
          'description' => 'Task is moderate, must be completed soon.',
          'created_at' => date('Y-m-d h:i:s'),
          'color'  => '#fbf785',
        ]);

        DB::table('priorities')->insert([
          'name' => 'Optional',
          'description' => 'Task can be worked on, but at a lower priority.',
          'created_at' => date('Y-m-d h:i:s'),
          'color'  => '#85dafb',
        ]);

        DB::table('priorities')->insert([
          'name' => 'Ignore',
          'description' => 'Task can be ignored for now.',
          'created_at' => date('Y-m-d h:i:s'),
          'color' => 'transparent'
        ]);
    }
}
