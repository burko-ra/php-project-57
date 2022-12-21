<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->insert([
            ['name' => 'новая'],
            ['name' => 'завершена'],
            ['name' => 'выполняется'],
            ['name' => 'в архиве'],
        ]);
    }
}
