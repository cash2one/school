<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'name' => '小学',
            ],
            [
                'name' => '初级中学',
            ],
            [
                'name' => '高级中学',
            ]
        ]);
    }
}
