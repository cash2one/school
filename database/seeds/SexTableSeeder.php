<?php

use Illuminate\Database\Seeder;

class SexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexs')->insert([
            [
                'name' => '男',
            ],
            [
                'name' => '女'
            ]
        ]);
    }
}
