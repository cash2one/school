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
                'name' => '一年级'
            ],
            [
                'name' => '二年级'
            ],
            [
                'name' => '三年级'
            ],
            [
                'name' => '四年级'
            ],
            [
                'name' => '五年级'
            ],
            [
                'name' => '六年级'
            ],
            [
                'name' => '七年级'
            ],
            [
                'name' => '八年级'
            ],
            [
                'name' => '九年级'
            ],
            [
                'name' => '高中一年级'
            ],
            [
                'name' => '高中二年级'
            ],
            [
                'name' => '高中三年级'
            ]
        ]);
    }
}
