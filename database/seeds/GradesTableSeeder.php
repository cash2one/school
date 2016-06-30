<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            [
                'name' => '一年级',
                'type_id' => 1
            ],
            [
                'name' => '二年级',
                'type_id' => 1
            ],
            [
                'name' => '三年级',
                'type_id' => 1
            ],
            [
                'name' => '四年级',
                'type_id' => 1
            ],
            [
                'name' => '五年级',
                'type_id' => 1
            ],
            [
                'name' => '六年级',
                'type_id' => 1
            ],
            [
                'name' => '七年级',
                'type_id' => 2
            ],
            [
                'name' => '八年级',
                'type_id' => 2
            ],
            [
                'name' => '九年级',
                'type_id' => 2
            ],
            [
                'name' => '高中一年级',
                'type_id' => 3
            ],
            [
                'name' => '高中二年级',
                'type_id' => 3
            ],
            [
                'name' => '高中三年级',
                'type_id' => 3
            ]
        ]);
    }
}
