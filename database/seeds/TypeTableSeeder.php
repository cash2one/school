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
                'genre' => 1
            ],
            [
                'name' => '初级中学',
                'genre' => 1
            ],
            [
                'name' => '高级中学',
                'genre' => 1
            ],
            [
                'name' => '家长认证',
                'genre' => 2
            ],
            [
                'name' => '家长续费',
                'genre' => 2
            ],
            [
                'name' => '校园公告',
                'genre' => 3
            ],
            [
                'name' => '年级公告',
                'genre' => 3
            ],
            [
                'name' => '班级公告',
                'genre' => 3
            ],
            [
                'name' => '习惯养成',
                'genre' => 4
            ],
            [
                'name' => '家庭作业',
                'genre' => 5
            ],
            [
                'name' => '学校作业',
                'genre' => 5
            ],
            [
                'name' => '微信支付',
                'genre' => 6
            ],
            [
                'name' => '余额支付',
                'genre' => 6
            ],
            [
                'name' => '余额自动扣费',
                'genre' => 6
            ],
            [
                'name' => '支付宝',
                'genre' => 6
            ]
        ]);
    }
}
