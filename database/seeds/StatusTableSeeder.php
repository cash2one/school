<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            [
                'name' => '成功',
            ],
            [
                'name' => '失败',
            ],
            [
                'name' => '到期',
            ],
            [
                'name' => '锁定'
            ],
            [
                'name' => '正常'
            ],
            [
                'name' => '欠费'
            ]
        ]);
    }
}
